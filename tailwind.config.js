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
        height:{
            ['group-hover']:'any',
            'profile_card_height' : '190px',
        },
        width:{
            'custom_width':'475px',
            'card_width':'300px',
            'profile_card_width': '217px',
        }
    },
  },
  plugins: [],
}

