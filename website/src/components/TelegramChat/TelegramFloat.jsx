"use client";

import Link from "next/link";
import { TelegramLogoIcon } from "@phosphor-icons/react";
import { useState, useEffect } from "react";
import { motion, AnimatePresence } from "framer-motion";

const TelegramFloat = () => {
  const telegramUsername = "BunthongRan";

  // State to manage the visibility of the tooltip on hover
  const [isHovered, setIsHovered] = useState(false);
  // State to manage the visibility of the button based on scroll position
  const [isVisible, setIsVisible] = useState(false);
  // State to manage the initial 5-second tooltip display
  const [showInitialTooltip, setShowInitialTooltip] = useState(false);

  // This effect adds a scroll event listener to the page
  useEffect(() => {
    const toggleVisibility = () => {
      if (window.scrollY > 100) {
        setIsVisible(true);
      } else {
        setIsVisible(false);
      }
    };

    window.addEventListener("scroll", toggleVisibility);
    return () => window.removeEventListener("scroll", toggleVisibility);
  }, []);

  // This effect handles the initial 7-second tooltip display
  useEffect(() => {
    let timer;
    if (isVisible) {
      // When the button appears, show the tooltip
      setShowInitialTooltip(true);
      // Set a timer to hide the tooltip after 5 seconds
      timer = setTimeout(() => {
        setShowInitialTooltip(false);
      }, 7000);
    } else {
      // If the button is hidden, ensure the tooltip is also hidden
      setShowInitialTooltip(false);
    }

    // Cleanup the timer if the component unmounts or visibility changes
    return () => clearTimeout(timer);
  }, [isVisible]);

  return (
    <AnimatePresence>
      {isVisible && (
        <motion.div
          initial={{ opacity: 0, y: 50 }}
          animate={{
            opacity: 1,
            y: [0, -8, 0],
          }}
          exit={{ opacity: 0, y: 50 }}
          transition={{
            duration: 0.3,
            ease: "easeInOut",
            y: {
              duration: 1.5,
              repeat: Infinity,
              repeatType: "reverse",
              ease: "easeInOut",
            },
          }}
          className="fixed bottom-8 right-8 z-50 flex items-center"
          onMouseEnter={() => setIsHovered(true)}
          onMouseLeave={() => setIsHovered(false)}
        >
          {/* Tooltip that appears on hover OR for the first 5 seconds */}
          <motion.div
            initial={{ opacity: 0, x: 20 }}
            animate={{
              opacity: isHovered || showInitialTooltip ? 1 : 0,
              x: isHovered || showInitialTooltip ? 0 : 20,
            }}
            transition={{ duration: 0.3, ease: "easeInOut" }}
            className="mr-4 rounded-md bg-gray-800 px-4 py-2 text-sm font-semibold text-white shadow-lg"
          >
            Chat with us!
          </motion.div>

          {/* The main button */}
          <Link
            href={`https://t.me/${telegramUsername}`}
            target="_blank"
            rel="noopener noreferrer"
            className="flex h-16 w-16 items-center justify-center rounded-full bg-blue-500 text-white shadow-lg"
            aria-label="Chat with us on Telegram"
          >
            <motion.div whileHover={{ scale: 1.2, rotate: 15 }}>
              <TelegramLogoIcon size={32} weight="fill" />
            </motion.div>
          </Link>
        </motion.div>
      )}
    </AnimatePresence>
  );
};

export default TelegramFloat;
