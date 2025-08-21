"use client";
import { useState, useEffect } from "react";
import AdBanner from "./AdBanner";
import { XIcon } from "@phosphor-icons/react";
import { AnimatePresence, motion } from "framer-motion";

const PopupAd = ({ ads }) => {
  // This state will hold the list of ads that haven't been closed yet
  const [activeAds, setActiveAds] = useState([]);
  // This state controls the initial appearance of the popup container
  const [isContainerOpen, setIsContainerOpen] = useState(false);

  // When the component loads, set the initial list of ads
  useEffect(() => {
    if (ads && ads.length > 0) {
      setActiveAds(ads);
    }
  }, [ads]);

  // This effect shows the first popup after a delay
  useEffect(() => {
    const timer = setTimeout(() => {
      if (activeAds.length > 0) {
        setIsContainerOpen(true);
      }
    }, 7000); // 7-second delay before the first ad appears
    return () => clearTimeout(timer);
  }, [activeAds]);


  // This function is called when the user clicks the 'X' button
  const handleClose = () => {
    // Animate the current ad out, then remove it from the list
    setActiveAds((prevAds) => prevAds.slice(1));
  };

  // If the container is closed or there are no more ads, render nothing
  if (!isContainerOpen || activeAds.length === 0) {
    return null;
  }

  // Get the current ad to display (always the first one in the list)
  const currentAd = activeAds[0];

  return (
    <div className="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4">
      <AnimatePresence>
        <motion.div
          key={currentAd.id} // The key is crucial for the animation to work
          initial={{ scale: 0.9, opacity: 0 }}
          animate={{ scale: 1, opacity: 1 }}
          exit={{ scale: 0.9, opacity: 0 }}
          transition={{ duration: 0.3, ease: "easeInOut" }}
          className="relative bg-transparent rounded-lg shadow-xl max-w-md w-full"
        >
          <button
            onClick={handleClose}
            className="absolute -top-3 -right-3 bg-white text-black rounded-full p-1 shadow-lg z-20"
          >
            <XIcon size={24} weight="bold" />
          </button>

          <div className="relative w-full overflow-hidden rounded-lg">
            {/* We pass an array with only the current ad to AdBanner */}
            <AdBanner ads={[currentAd]} />
          </div>
        </motion.div>
      </AnimatePresence>
    </div>
  );
};

export default PopupAd;
