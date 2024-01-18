/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        height:['group-hover'],
        width:{'custom_width':'475px'}
    },
  },
  plugins: [],
}

