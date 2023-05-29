/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
  ],
  theme: {
    screens: {
      'lg': {'max': '1024px'},
      'md': {'max': '768px'},
      'sm': {'max': '480px'}
    },
    extend: {
      colors: {
        mainblue: '#253a4f',
        maingreen: '#437d69'
      }
    }
  },
  plugins: [
    require('@tailwindcss/forms')
  ]
}

