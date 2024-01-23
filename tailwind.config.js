/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    ".resources/views/menus/**/*.blade.php"
  ],
  theme: {
    extend: {
        height:['group-hover'],
        width:{'custom_width':'475px'}
    },
  },
  plugins: [],
}

