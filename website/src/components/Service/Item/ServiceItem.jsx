"use client";
import React, { useEffect, useState, useMemo } from "react";
import { Reorder, useMotionValue, motion } from "framer-motion";
import { XIcon, ArrowClockwiseIcon } from "@phosphor-icons/react"; // Import new icons

// A small array of motivational quotes
const motivationalQuotes = [
    "The secret of getting ahead is getting started.",
    "The best way to predict the future is to create it.",
    "Believe you can and you're halfway there.",
    "The only limit to our realization of tomorrow is our doubts of today.",
    "Do what you can, with what you have, where you are.",
    "Success is not final, failure is not fatal: it is the courage to continue that counts.",
    "It does not matter how slowly you go as long as you do not stop.",
    "Everything you’ve ever wanted is on the other side of fear.",
    "Strive for progress, not perfection.",
    "The future belongs to those who believe in the beauty of their dreams.",
    "You are never too old to set another goal or to dream a new dream.",
    "The journey of a thousand miles begins with a single step.",
    "Dream big, start small, but most of all, start.",
    "Your time is limited, so don’t waste it living someone else’s life.",
    "Great things never come from comfort zones.",
    "Don’t watch the clock; do what it does. Keep going.",
    "Push yourself, because no one else is going to do it for you.",
    "Every accomplishment starts with the decision to try.",
    "Don’t be afraid to give up the good to go for the great.",
    "Small steps in the right direction can turn out to be the biggest steps of your life.",
    "Doubt kills more dreams than failure ever will.",
    "Start where you are. Use what you have. Do what you can.",
];

// A custom hook to apply a box shadow when an item is dragged
function useRaisedShadow(value) {
    const boxShadow = useMotionValue("");
    useEffect(() => {
        let isActive = false;
        value.onChange((latest) => {
            const wasActive = isActive;
            if (latest !== 0) {
                isActive = true;
                if (isActive !== wasActive) {
                    boxShadow.set("0px 10px 20px rgba(0,0,0,0.2)");
                }
            } else {
                isActive = false;
                if (isActive !== wasActive) {
                    boxShadow.set("0px 0px 0px rgba(0,0,0,0)");
                }
            }
        });
        return () => {};
    }, [value, boxShadow]);
    return boxShadow;
}

const ServiceItem = ({ item, number, onRemove }) => {
  const y = useMotionValue(0);
  const boxShadow = useRaisedShadow(y);
  const [isFlipped, setIsFlipped] = useState(false);

  // Select a random quote for each card, but only once
  const [quote, setQuote] = useState("");

  // This ensures the random quote is only generated on the client-side
  useEffect(() => {
    setQuote(motivationalQuotes[Math.floor(Math.random() * motivationalQuotes.length)]);
  }, []);

  return (
    <Reorder.Item
      value={item}
      id={item.id}
      style={{ boxShadow, y, perspective: 1000 }} // Add perspective for 3D effect
      className="service-item relative cursor-grab active:cursor-grabbing"
      exit={{ opacity: 0, scale: 0.8 }}
      transition={{ duration: 0.3 }}
      layout // This is important for smooth reordering animations
    >
      <motion.div
        className="relative w-full h-full"
        style={{ transformStyle: "preserve-3d" }}
        animate={{ rotateY: isFlipped ? 180 : 0 }}
        transition={{ duration: 0.5 }}
      >
        {/* --- FRONT SIDE OF THE CARD --- */}
        <div
          style={{ backfaceVisibility: "hidden" }}
          className="relative p-8 bg-white rounded-lg border border-line w-full h-full"
        >
          <button
            onClick={() => onRemove(item.id)}
            onPointerDown={(e) => e.stopPropagation()}
            className="absolute top-2 right-2 bg-blue-500 text-white rounded-full p-1 hover:bg-red-500 hover:text-white transition-colors z-10"
            aria-label="Remove item"
          >
            <XIcon size={10} />
          </button>

          <button
            onClick={(e) => {
                e.stopPropagation(); // Prevent drag from starting
                setIsFlipped(true);
            }}
            onPointerDown={(e) => e.stopPropagation()}
            className="absolute top-2 left-2 bg-gray-100 text-gray-600 rounded-full p-1 hover:bg-blue-500 hover:text-white transition-colors z-10"
            aria-label="Flip card"
          >
            <ArrowClockwiseIcon size={16} />
          </button>

          <div className="service-item-main h-full">
            <div className="heading flex items-center justify-between">
              {item.icon && (
                <div className="text-blue-600">
                  <i className={`${item.icon} text-6xl`}></i>
                </div>
              )}
              <div className="number heading3 text-placehover text-slate-400">
                {number + 1 < 10 ? `0${number + 1}` : number + 1}
              </div>
            </div>
            <div className="heading6 hover:text-blue duration-300 mt-6">
              {item.title}
            </div>
            <div className="text-secondary mt-2">{item.description}</div>
          </div>
        </div>

        {/* --- BACK SIDE OF THE CARD --- */}
        <div
          style={{ backfaceVisibility: "hidden", transform: "rotateY(180deg)" }}
          onClick={() => setIsFlipped(false)}
          className="absolute top-0 left-0 w-full h-full p-8 bg-blue-600 text-white rounded-lg flex flex-col justify-center items-center cursor-pointer"
        >
            {/* --- Quote--- */}
            <p className="text-center font-semibold italic text-xl">"{quote}"</p>
        </div>

      </motion.div>
    </Reorder.Item>
  );
};

export default ServiceItem;
