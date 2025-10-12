/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Kagoda', 'Inter', 'sans-serif'],
      },
    },
  },
  daisyui: {
    themes: [
      {
        infoviva: {
          "primary": "#5d2975",         // Roxo institucional
          "secondary": "#f9cee0",       // Rosa claro
          "accent": "#cbb9d8",          // Roxo suave
          "neutral": "#3D3D3D",         // Cor neutra para textos
          "base-100": "#ffffff",        // Fundo branco
          "base-200": "#f4e5db",        // Bege de apoio (fundo alternativo)
          "info": "#cfe9e2",            // Verde menta
          "success": "#84cc16",         // Verde sucesso
          "warning": "#facc15",         // Amarelo
          "error": "#f87171",           // Vermelho claro
        },
      },
      "light", // fallback padrão
    ],
  },
  plugins: [require("daisyui")],
}
