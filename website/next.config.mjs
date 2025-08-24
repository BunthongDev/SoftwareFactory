/** @type {import('next').NextConfig} */
const nextConfig = {
  // This is the critical line that creates the 'out' folder
  output: "export",
  images: {
    dangerouslyAllowSVG: true,
    remotePatterns: [
      // For local development
      {
        protocol: "http",
        hostname: "127.0.0.1",
        port: "8000",
        pathname: "/upload/**",
      },

      // For the live production server
      {
        protocol: "https",
        hostname: "titi-dashboard.anajaksoftware.com",
        port: "",
        pathname: "/storage/**",
      },
    ],
  },
};

export default nextConfig;
