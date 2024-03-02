module.exports = {
  plugins: {
    tailwindcss: {},
    autoprefixer: {},
  },
  theme: {
    extend: {
      // Adds a new breakpoint in addition to the default breakpoints
      color: {
        danger: 'red',
      }
    }
  }
}