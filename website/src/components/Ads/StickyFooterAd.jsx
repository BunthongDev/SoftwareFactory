"use client";
import { useState } from "react";
import Link from "next/link";
import Image from "next/image";
import { XIcon } from "@phosphor-icons/react";
import { AnimatePresence, motion } from "framer-motion";

// A self-contained component for a single ad banner
const SingleStickyAd = ({ ad }) => {
  const [isOpen, setIsOpen] = useState(true);

  if (!isOpen) {
    return null; // This will make the ad disappear when closed
  }

  const adContent = (
    <Image
      src={ad.image_url}
      alt={ad.title || "Advertisement"}
      width={1280} // A large base width for aspect ratio calculation
      height={150}  // A common banner ad height
      className="object-contain w-full h-auto" // Image will scale to fit container width
    />
  );

  return (
    <motion.div
      layout // Ensures smooth animation when an item is removed
      initial={{ opacity: 0, scale: 0.9 }}
      animate={{ opacity: 1, scale: 1 }}
      exit={{ opacity: 0, scale: 0.9 }}
      transition={{ duration: 0.3, ease: "easeInOut" }}
      className="relative w-full" // The ad takes the full width of its container
    >
      {ad.link_url ? (
        <Link href={ad.link_url} target="_blank" rel="noopener noreferrer" className="block">
          {adContent}
        </Link>
      ) : (
        <div>{adContent}</div>
      )}
      <button
        onClick={() => setIsOpen(false)}
        className="absolute top-0 right-0 mt-1 mr-1 bg-black/50 text-white rounded-full p-1 shadow-lg hover:bg-red-500 transition-colors"
        aria-label="Close ad"
      >
        <XIcon size={16} weight="bold" />
      </button>
    </motion.div>
  );
};


// The main component now manages the list of ads
const StickyFooterAd = ({ ads }) => {
  // If there are no ads, render nothing
  if (!ads || ads.length === 0) {
    return null;
  }

  return (
    // The main container is now flush with the bottom of the screen
    <div className="fixed bottom-0 left-0 w-full z-40 flex justify-center items-end pointer-events-none pt-2 sm:pt-4">
      <div className="pointer-events-auto w-full max-w-4xl">
        {/* This container will stack the ads vertically with gap-y-1 */}
        <div className="flex flex-col items-center gap-y-1">
          <AnimatePresence>
            {ads.map((ad) => (
              <SingleStickyAd key={ad.id} ad={ad} />
            ))}
          </AnimatePresence>
        </div>
      </div>
    </div>
  );
};

export default StickyFooterAd;
