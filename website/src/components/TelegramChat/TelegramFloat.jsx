"use client";

import Link from "next/link";
import { TelegramLogoIcon, XIcon } from "@phosphor-icons/react";
import { useState, useEffect, useRef } from "react";
import { motion, AnimatePresence } from "framer-motion";

// Array of messages to cycle through
const tooltipMessages = [
  "Chat with us!",
  "We are online!",
  "How can we help you?☺️",
];

const TelegramFloat = () => {
  const telegramUsername = "BunthongRan";

  const [isHovered, setIsHovered] = useState(false);
  const [isVisible, setIsVisible] = useState(false);
  const [showInitialTooltip, setShowInitialTooltip] = useState(false);
  const [messageIndex, setMessageIndex] = useState(0);
  // New state to track if the user has closed the widget
  const [isClosed, setIsClosed] = useState(false);
  const audioCtx = useRef(null);

  // Function to play a short "tick" sound
  const playSound = () => {
    if (!audioCtx.current) {
      audioCtx.current = new (window.AudioContext ||
        window.webkitAudioContext)();
    }
    const oscillator = audioCtx.current.createOscillator();
    const gainNode = audioCtx.current.createGain();
    oscillator.connect(gainNode);
    gainNode.connect(audioCtx.current.destination);

    // Sound changed back to a "tick"
    oscillator.type = "sine";
    oscillator.frequency.setValueAtTime(800, audioCtx.current.currentTime); // High-pitched tick
    gainNode.gain.setValueAtTime(0.1, audioCtx.current.currentTime); // Start at a low volume
    gainNode.gain.exponentialRampToValueAtTime(
      0.00001,
      audioCtx.current.currentTime + 0.2
    ); // Fade out quickly

    oscillator.start();
    oscillator.stop(audioCtx.current.currentTime + 0.2);
  };

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

  useEffect(() => {
    let timer;
    if (isVisible) {
      setShowInitialTooltip(true);
      timer = setTimeout(() => {
        setShowInitialTooltip(false);
      }, 7000);
    } else {
      setShowInitialTooltip(false);
    }
    return () => clearTimeout(timer);
  }, [isVisible]);

  useEffect(() => {
    let messageInterval;
    // The interval will only run if the tooltip is visible AND the widget is not closed
    if ((isHovered || showInitialTooltip) && !isClosed) {
      messageInterval = setInterval(() => {
        setMessageIndex((prevIndex) => {
          const newIndex = (prevIndex + 1) % tooltipMessages.length;
          playSound();
          return newIndex;
        });
      }, 3000);
    }
    // This cleanup function will now correctly stop the interval when the widget is closed
    return () => clearInterval(messageInterval);
  }, [isHovered, showInitialTooltip, isClosed]);

  return (
    <AnimatePresence>
      {/* Only render if visible AND not closed by the user */}
      {isVisible && !isClosed && (
        <motion.div
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: [0, -8, 0] }}
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
          <motion.div
            initial={{ opacity: 0, x: 20 }}
            animate={{
              opacity: isHovered || showInitialTooltip ? 1 : 0,
              x: isHovered || showInitialTooltip ? 0 : 20,
            }}
            transition={{ duration: 0.3, ease: "easeInOut" }}
            className="mr-4 flex h-10 w-40 items-center justify-center overflow-hidden rounded-md bg-gray-800 px-4 py-2 text-sm font-semibold text-white shadow-lg"
          >
            <AnimatePresence mode="wait">
              <motion.p
                key={messageIndex}
                initial={{ y: 20, opacity: 0 }}
                animate={{ y: 0, opacity: 1 }}
                exit={{ y: -20, opacity: 0 }}
                transition={{ duration: 0.3, ease: "easeInOut" }}
              >
                {tooltipMessages[messageIndex]}
              </motion.p>
            </AnimatePresence>
          </motion.div>

          {/* Main button container */}
          <div className="relative">
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
            {/* Close Button positioned on the Telegram Logo */}
            <button
              onClick={() => setIsClosed(true)}
              className="absolute -top-1 -right-1 flex h-6 w-6 items-center justify-center rounded-full bg-gray-700 text-white shadow-md transition-colors hover:bg-red-500"
              aria-label="Close chat popup"
            >
              <XIcon size={16} />
            </button>
          </div>
        </motion.div>
      )}
    </AnimatePresence>
  );
};

export default TelegramFloat;
