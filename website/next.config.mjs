/** @type {import('next').NextConfig} */
const nextConfig = {
  // Add this 'images' object
  images: {
    remotePatterns: [
      {
        protocol: "http",
        hostname: "127.0.0.1",
        port: "8001",
        pathname: "/upload/**",
      },
    ],
  },
};


export default nextConfig;
