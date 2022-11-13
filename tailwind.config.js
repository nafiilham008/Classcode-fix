/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        "open-sans": ["Open Sans", "sans-serif"],
        "vietnam":["Be Vietnam Pro", "sans-serif"],
        "poppins": ["Poppins","sans-serif"]
      },
    },
  },
  plugins: [],
}