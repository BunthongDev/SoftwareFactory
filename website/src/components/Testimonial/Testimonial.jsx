"use client";
import React from "react";
import Image from "next/image";
// 1. ADDED MORE HOOKS FROM FRAMER MOTION & REACT
import {
  motion,
  AnimatePresence,
  useMotionValue,
  useTransform,
} from "framer-motion";
import * as Icon from "@phosphor-icons/react/dist/ssr";

const testimonialData = [
  {
    id: 1,
    quote:
      "Their expertise helped us launch ahead of schedule. A truly remarkable and professional team.",
    name: "Sarah Johnson",
    role: "CEO of FinApp",
    avatar: "/images/caseone.webp",
  },
  {
    id: 2,
    quote:
      "The custom logistics system they built has revolutionized our workflow. Efficiency is up by over 50%.",
    name: "Michael Chen",
    role: "COO of SupplyCo",
    avatar: "/images/casetwo.webp",
  },
  {
    id: 3,
    quote:
      "An incredible eye for design. They transformed our concept into a beautiful, intuitive app users love.",
    name: "Emily Rodriguez",
    role: "Product Manager, HealthTrack",
    avatar: "/images/casethree.webp",
  },
  {
    id: 4,
    quote:
      "A game-changer for our e-commerce site. The new platform is fast, scalable, and our sales have increased by 40%.",
    name: "David Lee",
    role: "Founder of StyleHub",
    avatar: "/images/casefour.webp",
  },
  {
    id: 5,
    quote:
      "The data analytics solution provided invaluable insights, allowing us to make smarter, data-driven decisions.",
    name: "Jessica Martinez",
    role: "Marketing Director, Marketly",
    avatar: "/images/casetwo.webp",
  },
  {
    id: 6,
    quote:
      "From concept to launch, the game development process was seamless. An incredibly talented and professional team.",
    name: "Chris Evans",
    role: "Lead Producer, Titan Games",
    avatar: "/images/casethree.webp",
  },
];

const MAX_VISIBLE_CARDS = 3;

const Testimonial = () => {
  const [activeIndex, setActiveIndex] = React.useState(0);
  const [direction, setDirection] = React.useState(0);

  // --- 2. START LOGIC FOR THE 3D TILT EFFECT  ---
  const headingRef = React.useRef(null);
  const x = useMotionValue(0);
  const y = useMotionValue(0);

  // Map mouse position to rotation values.
  // The range [-100, 100] represents the distance from the center of the element.
  // The range [15, -15] is the degree of rotation.
  const rotateX = useTransform(y, [-100, 100], [15, -15]);
  const rotateY = useTransform(x, [-100, 100], [-15, 15]);

  const handleMouseMove = (event) => {
    const rect = headingRef.current.getBoundingClientRect();
    const width = rect.width;
    const height = rect.height;

    // Calculate mouse position relative to the center of the element
    const mouseX = event.clientX - rect.left - width / 2;
    const mouseY = event.clientY - rect.top - height / 2;

    // Update motion values
    x.set(mouseX);
    y.set(mouseY);
  };

  const handleMouseLeave = () => {
    // Reset to default state
    x.set(0);
    y.set(0);
  };
  // ---END LOGIC FOR THE 3D TILT EFFECT  ---

  const nextCard = () => {
    setDirection(1);
    setActiveIndex((prevIndex) => (prevIndex + 1) % testimonialData.length);
  };

  const prevCard = () => {
    setDirection(-1);
    setActiveIndex(
      (prevIndex) =>
        (prevIndex - 1 + testimonialData.length) % testimonialData.length
    );
  };

  const handleDragEnd = (event, info) => {
    const dragDistance = info.offset.x;
    if (dragDistance > 100) {
      prevCard();
    } else if (dragDistance < -100) {
      nextCard();
    }
  };

  return (
    <section className="testimonial-deck-block bg-slate-100 lg:py-24 sm:py-20 py-16">
      <div className="container">
        {/* 3. UPDATED HEADING SECTION WITH EVENT HANDLERS */}
        <div
          ref={headingRef}
          onMouseMove={handleMouseMove}
          onMouseLeave={handleMouseLeave}
          className="heading text-center max-w-2xl mx-auto"
          style={{ perspective: "800px" }} // This enables the 3D space
        >
          <motion.div
            style={{ rotateX, rotateY, transformStyle: "preserve-3d" }}
          >
            <h2 className="heading2 font-bold text-transparent bg-clip-text bg-gradient-to-r from-black to-blue-600">
              Trusted By Professionals
            </h2>
            <div className="w-40 h-1 bg-gradient-to-r from-black to-blue-500 mx-auto mt-2 rounded-full"></div>
          </motion.div>

          <p className="body1 mt-4 text-gray-600">
            Hear what our clients have to say about our work and commitment to
            excellence.
          </p>
        </div>

        <div className="relative w-full max-w-lg mx-auto mt-12 h-[500px]">
          <AnimatePresence initial={false}>
            {testimonialData
              .slice(activeIndex, activeIndex + MAX_VISIBLE_CARDS)
              .reverse()
              .map((testimonial, i) => {
                const indexInDeck = MAX_VISIBLE_CARDS - 1 - i;
                const isTopCard = indexInDeck === 0;

                return (
                  <motion.div
                    key={testimonial.id}
                    className="absolute w-full h-full p-8 bg-white rounded-2xl shadow-2xl border border-gray-200 flex flex-col cursor-grab active:cursor-grabbing"
                    initial={{ scale: 1, y: 0, rotate: 0 }}
                    animate={{
                      scale: 1 - indexInDeck * 0.05,
                      y: indexInDeck * -10,
                      rotate: indexInDeck * (Math.random() > 0.5 ? 1 : -1) * 2,
                      zIndex: testimonialData.length - indexInDeck,
                    }}
                    drag={isTopCard ? "x" : false}
                    dragConstraints={{ left: 0, right: 0, top: 0, bottom: 0 }}
                    onDragEnd={handleDragEnd}
                    transition={{ duration: 0.5, ease: [0.16, 1, 0.3, 1] }}
                    exit={{
                      x: direction > 0 ? -500 : 500,
                      opacity: 0,
                      scale: 0.8,
                      transition: { duration: 0.4, ease: "easeIn" },
                    }}
                  >
                    <Icon.QuotesIcon
                      size={40}
                      className="text-blue-500"
                      weight="fill"
                    />
                    <p className="font-serif text-2xl text-gray-800 mt-6 flex-grow">
                      “{testimonial.quote}”
                    </p>
                    <div className="border-t border-gray-200 mt-6 pt-6 flex items-center gap-4">
                      <Image
                        src={testimonial.avatar}
                        width={100}
                        height={100}
                        alt={testimonial.name}
                        className="rounded-lg border-b-blue-500 border-r-blue-500 border-4"
                      />
                      <div>
                        <strong className="text-lg font-semibold text-gray-900">
                          {testimonial.name}
                        </strong>
                        <span className="block text-gray-500">
                          {testimonial.role}
                        </span>
                      </div>
                    </div>
                  </motion.div>
                );
              })}
          </AnimatePresence>
        </div>

        {/* Navigation Controls */}
        <div className="flex items-center justify-center gap-4 mt-8">
          <button
            onClick={prevCard}
            className="flex items-center justify-center w-14 h-14 rounded-full bg-white border border-gray-300 text-gray-600 hover:bg-gray-200 duration-200"
          >
            <Icon.ArrowLeftIcon size={24} />
          </button>
          <div className="font-semibold text-gray-700">
            {activeIndex + 1} / {testimonialData.length}
          </div>
          <button
            onClick={nextCard}
            className="flex items-center justify-center w-14 h-14 rounded-full bg-white border border-gray-300 text-gray-600 hover:bg-gray-200 duration-200"
          >
            <Icon.ArrowRightIcon size={24} />
          </button>
        </div>
      </div>
    </section>
  );
};

export default Testimonial;
