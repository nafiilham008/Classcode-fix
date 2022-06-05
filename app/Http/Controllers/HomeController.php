<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Backend\Kelas;
use App\Models\Backend\Payment;
use App\Models\Backend\Promo;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Kelas::all()->skip(0)->take(3);
        return view('home.index', compact('data'));
    }


    public function about()
    {
        return view('home.about');
    }

    public function welcome()
    {
        $details = [
            'title' => 'Mail from Classcode',
            'body' => 'Tes SMTP'
        ];

        Mail::to('19102116@ittelkom-pwt.ac.id')->send(new SendEmail($details));

        dd("Email is Sent.");
    }

    public function search( Request $request)
    {
        $all = Kelas::limit(3)->get();
        $params = $request->search;
        if ($request->search == "") {
            // Jika pencarian kosong
            $data = 'data';
        } else {
            // Jika pencarian masuk
            $request->validate([
                'search' => 'required|min:1'
            ]);

            $data = Kelas::where('title', 'like', "%{$params}%")->get();
        }
        
        
        // dd($request->all());
        
        return view('home.search', compact('data', 'all'));


    }

    public function checkout($url_kelas)
    {
        $data = Kelas::where('slug_url', $url_kelas)->first();
        if (empty($data)) {
            # code...
            return redirect()->back();
        } else {
            # code...
            $check = DB::table('checkouts')
                ->select('kelas.*', 'checkouts.*', 'checkouts.harga as harga_akhir', 'kelas.harga as harga_sebelum')
                ->join('kelas', 'kelas.id', '=', 'checkouts.kelas_id')
                ->where(['user_id' => auth()->user()->id, 'kelas_id' => $data->id])
                ->first();
            if (empty($check)) {
                # jika belum ada maka
                Checkout::create([
                    'kelas_id' => $data->id,
                    'user_id' => auth()->user()->id,
                    'harga' => $data->harga
                ]);
                return redirect()->route('checkout.index', $data->slug_url);
            } else {
                # jika sudah ada maka
                return view('checkout.index', compact('check'));
            }
        }
    }

    public function check_promo(Request $request, $url_kelas)
    {
        $data = Kelas::where('slug_url', $url_kelas)->first();
        if (empty($data)) {
            # code...
            return redirect()->back();
        } else {
            # code...
            $request->validate([
                'kode' => 'required'
            ]);
            $promo = Promo::where('kode_promo', $request->kode)->first();
            $awal = ($promo->diskon / 100) * $data->harga;
            $akhir = $data->harga - $awal;
            Checkout::where(['user_id' => auth()->user()->id, 'kelas_id' => $data->id])->update(['harga' => $akhir, 'diskon' => $promo->diskon, 'kode_promo' => $promo->kode_promo]);
            return redirect()->route('checkout.index', $data->slug_url);
        }
    }

    public function cancel_checkout($url_kelas)
    {
        $data = Kelas::where('slug_url', $url_kelas)->first();

        $checkout = Checkout::where([
            'user_id' => auth()->user()->id,
            'kelas_id' => $data->id
        ])->first();

        $checkout->delete();

        return redirect()->route('kelas.detail', $data->slug_url);
    }

    public function pay($url_kelas)
    {
        $data = Kelas::where('slug_url', $url_kelas)->first();
        if (empty($data)) {
            # code...
            return redirect()->back();
        } else {
            # code...
            $pay = Payment::all();
            $data_fix = DB::table('checkouts')
                ->select('kelas.*', 'checkouts.*', 'checkouts.harga as harga_akhir', 'kelas.harga as harga_sebelum')
                ->join('kelas', 'kelas.id', '=', 'checkouts.kelas_id')
                ->where(['user_id' => auth()->user()->id, 'kelas_id' => $data->id])
                ->first();
            return view('payment.index', compact('data', 'pay', 'data_fix'));
        }
    }

    public function konfirmasi($url_kelas, Request $request)
    {
        
        $data = Kelas::where('slug_url', $url_kelas)->first();


        if (empty($data)) {
            # jika kelas kosong maka
            return redirect()->back();
        } else {
            # jika tidak kosong maka
            $check = Checkout::where(['user_id' => auth()->user()->id, 'kelas_id' => $data->id])->first();
            // check data pada checkout
            $pay = Payment::find($request->payment);
            if (empty($pay)) {
                # jika payment tidak ada maka
                return redirect()->back();
            } else {
                # jika ada maka
                if (empty($check->payment_id)) {
                    # jika payment id kosong pada checkout maka

                    $join = DB::table('checkouts')
                        // ->select('kelas.*', 'checkouts.*', 'checkouts.harga as harga_akhir', 'kelas.harga as harga_sebelum')
                        ->join('users', 'users.id', '=', 'checkouts.user_id')
                        ->join('kelas', 'kelas.id', '=', 'checkouts.kelas_id')
                        ->where(['users.id' => auth()->user()->id, 'checkouts.kelas_id' => $data->id])
                        ->first();

                    $check->update([
                        'payment_id' => $pay->id,
                        'status' => 'success'
                    ]);

                    DB::table('join_kelas')->insert([
                        'kelas_id' => $join->kelas_id,
                        'user_id' => $join->user_id
                    ]);
                    return view('payment.sukses', compact('data', 'check', 'pay', 'join'));
                } else {
                    # jika payment id ada pada checkout maka
                    return view('payment.gagal');
                }
            }
        }
    }

    public function detail($slug_url)
    {
        $data = Kelas::where('slug_url', $slug_url)->first();
        if (empty($data)) {
            # jika data kelas kosong atau url tidak ada maka
            return redirect()->route('index');
        } else {
            # jika url tersedia maka
            return view('kelas.detail', compact('data'));
        }
    }

    public function kelas()
    {
        $data = Kelas::all();

        return view('kelas.index', compact('data'));
    }

    public function promo()
    {
        $data = Promo::all();
        return view('promo.index', compact('data'));
    }

    public function get_info(Request $request, $id)
    {
        $data = Promo::find($id);

        if ($request->ajax()) {
            # jika ada request dari ajax maka
            return response()->json(['data' => $data->deskripsi]);
        } else {
            # jika tidak ada maka
            return redirect()->route('promo.index');
        }
    }


    public function get_coupon(Request $request, $id)
    {
        $data = Promo::find($id);

        if ($request->ajax()) {
            # jika ada request dari ajax maka
            return response()->json(['data' => $data->kode_promo]);
        } else {
            # jika tidak ada maka
            return redirect()->route('promo.index');
        }
    }
    // public function login(Request $request)
    // {
    //     dd($request->all());
    // }
}
