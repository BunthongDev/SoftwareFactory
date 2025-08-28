/** @type {import('next').NextConfig} */
const nextConfig = {
  reactStrictMode: true,
  output: "export", // keep static export for Hostinger
  images: {
    unoptimized: true, // <-- disable Next image optimization (required for export)
    dangerouslyAllowSVG: true,
    remotePatterns: [
      // local backend during development
      // {
      //   protocol: "http",
      //   hostname: "127.0.0.1",
      //   port: "8000",
      //   pathname: "/**",
      // },
      // {
      //   protocol: "http",
      //   hostname: "localhost",
      //   port: "8000",
      //   pathname: "/**",
      // },
      // production backend hosts
      {
        protocol: "https",
        hostname: "titi-dashboard.anajaksoftware.com",
        port: "",
        pathname: "/**",
      },
      {
        protocol: "https",
        hostname: "anajaksoftware.com",
        port: "",
        pathname: "/**",
      },
    ],
  },
};

export default nextConfig;
