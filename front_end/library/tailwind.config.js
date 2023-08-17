/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js}",
  ],
  theme: {
    extend: { 
      colors :{
        primarycolor : '#e5e5e5'
      }
    },
  },
  plugins: [],
}

