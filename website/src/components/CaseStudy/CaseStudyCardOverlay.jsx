"use client"; // This component has Framer Motion, so it must be a client component

import Image from "next/image";
import { motion } from "framer-motion";

export default function CaseStudyCardOverlay({ study, onClick }) {
  return (
    <motion.div
      className="relative rounded-2xl overflow-hidden cursor-pointer group h-full"
      onClick={onClick} // Keep onClick for the homepage's modal
      initial={{ opacity: 0, y: 20 }}
      whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: true }}
      transition={{ duration: 0.5 }}
    >
      <Image
        src={study.image}
        alt={study.title}
        width={500} // You can use width/height or fill, depending on your needs
        height={500} // using fill would require the parent to have a defined height
        className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
      />
      {/* Overlay for title */}
      <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
      <div className="absolute bottom-0 left-0 p-6 text-white">
        <h3 className="text-2xl font-bold">{study.title}</h3>
      </div>
    </motion.div>
  );
}
