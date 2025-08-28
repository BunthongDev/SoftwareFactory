"use client";

import Link from 'next/link';
import Image from 'next/image';
import { motion } from 'framer-motion';

export default function NotFound() {
  return (
    <div className="flex items-center justify-center min-h-screen bg-gray-50 p-4">
      <div className="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-12 lg:gap-16">
        
        {/* Animated Image Container */}
        <motion.div
          animate={{
            scale: [1, 1.03, 1], // Keyframes for a subtle "breathing" effect
          }}
          transition={{
            duration: 4, // Duration of one full cycle
            repeat: Infinity, // Repeat the animation forever
            ease: "easeInOut",
          }}
          
          className="w-full max-w-sm md:max-w-md lg:max-w-lg"
        >
          <Image
            src="/AnajakSoftware-page-not-found.png" // The path to image in the public folder
            alt="Page Not Found Illustration"
            width={500}
            height={500}
            className="object-contain"
          />
        </motion.div>

        {/* Text Content */}
        <div className="text-center md:text-left">
            <p className="text-xl font-semibold text-blue-600 font-battambang text-[80px] m-10">៤០៤</p>
            <h1 className="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Page not found</h1>
            <p className="mt-4 text-base text-gray-600">Sorry, we couldn’t find the page you’re looking for.</p>
            <div className="mt-8">
                <Link href="/" className="px-8 py-3 bg-blue-500 text-white font-semibold hover:bg-blue-700 transition-colors shadow-lg">
                    Go back home
                </Link>
            </div>
        </div>

      </div>
    </div>
  );
}
