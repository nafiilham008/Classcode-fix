<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('kelas_id');
            $table->string('user_id');
            $table->integer('harga');
            $table->string('kode_promo')->nullable();
            $table->integer('diskon')->nullable();
            $table->integer('payment_id')->nullable();
            $table->string('image_trx')->nullable();
            $table->enum('status',['success','failed'])->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
