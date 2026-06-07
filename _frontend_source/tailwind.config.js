/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./**/*.html",
  ],
  theme: {
    extend: {
      colors: {
        'navy': '#001f3f',
        'deep-green': '#0d4d2e',
        'light-gray': '#f5f5f5',
        'accent': '#e8e8e8',
      },
      fontFamily: {
        sans: ['Inter', 'Poppins', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
