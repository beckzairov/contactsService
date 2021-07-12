module.exports = {
  purge: [

     './resources/**/*.blade.php',

     './resources/**/*.js',

     './resources/**/*.vue',

  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      transitionTimingFunction: {

        'in-expo': 'cubic-bezier(0.95, 0.05, 0.795, 0.035)',

        'out-expo': 'cubic-bezier(0.19, 1, 0.22, 1)',
       }
    },
  },
  variants: {
    width: ["responsive", "hover", "focus"],
    extend: {
      transitionTimingFunction: ['hover', 'focus']
    },
  },
  plugins: [],
}
