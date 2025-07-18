/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/components/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/app/**/*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    extend: {
      colors: {
        background: "var(--background)",
        foreground: "var(--foreground)",
      },
      // 👇 ADD THIS CONFIGURATION
      animation: {
        marquee: "marquee 20s linear infinite", // Case studies path
        "gradient-shine": "gradient-shine 5s linear infinite", // Testimonial path
      },

      keyframes: {
        // Case studies path
        marquee: {
          "0%": { transform: "translateX(0%)" },
          "100%": { transform: "translateX(-100%)" },
        },
        // Testimonial path
        "gradient-shine": {
          "0%, 100%": { "background-position": "0% 50%" },
          "50%": { "background-position": "100% 50%" },
        },
      },
      // 👆 END OF CONFIGURATION
    },
  },
  plugins: [],
};
