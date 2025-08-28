"use client"; // This component still uses Framer Motion, so it must be a client component

import Image from "next/image";
import { motion } from "framer-motion";

export default function CaseStudyCardDetailed({ study }) { // 👈 1. Removed onClick prop
  return (
    <motion.div
      className="bg-white rounded-2xl shadow-lg overflow-hidden group h-full flex flex-col"
      // 👈 2. Removed onClick handler
      initial={{ opacity: 0, y: 20 }}
      whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: true }}
      transition={{ duration: 0.5 }}
    >
      <div className="relative h-56 w-full">
        <Image
          src={study.image}
          alt={study.title}
          fill
          className="object-cover group-hover:scale-105 transition-transform duration-300"
        />
      </div>
      <div className="p-6 flex-grow">
        <h3 className="text-xl font-bold text-gray-900 mb-2">
          {study.title}
        </h3>
        <p className="text-gray-600 line-clamp-4">
          {study.description}
        </p>
      </div>
    </motion.div>
  );
}