"use client";

import React, { useState } from "react";
import Image from "next/image";
import { motion, AnimatePresence } from "framer-motion";
import * as Icon from "@phosphor-icons/react/dist/ssr";
import Link from "next/link";

// A component for the modal that displays the full case study
const CaseStudyModal = ({ study, closeModal }) => {
  return (
    <AnimatePresence>
      <motion.div
        className="fixed inset-0 bg-black/70 z-50 flex items-center justify-center p-4"
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        exit={{ opacity: 0 }}
        onClick={closeModal}
      >
        <motion.div
          className="bg-white rounded-2xl w-full max-w-3xl max-h-[90vh] overflow-y-auto"
          initial={{ scale: 0.9, y: 50 }}
          animate={{ scale: 1, y: 0 }}
          exit={{ scale: 0.9, y: 50 }}
          transition={{ type: "spring", stiffness: 300, damping: 25 }}
          onClick={(e) => e.stopPropagation()} // Prevent closing when clicking inside the modal
        >
          <div className="relative h-96 w-full">
            <Image
              src={study.image}
              alt={study.title}
              fill
              className="object-cover"
            />
          </div>
          <div className="p-8">
            <h2 className="text-3xl font-bold text-gray-900">{study.title}</h2>
            <p className="mt-4 text-lg text-gray-600">{study.description}</p>
          </div>
        </motion.div>
        <button
          onClick={closeModal}
          className="absolute top-4 right-4 text-white hover:text-gray-300"
          aria-label="Close"
        >
          <Icon.X size={32} />
        </button>
      </motion.div>
    </AnimatePresence>
  );
};

// A component for a single card in the staggered grid
const CaseStudyCard = ({ study, onClick }) => {
  return (
    <motion.div
      className="relative rounded-2xl overflow-hidden cursor-pointer group h-full"
      onClick={onClick}
      initial={{ opacity: 0, y: 20 }}
      whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: true }}
      transition={{ duration: 0.5 }}
    >
      <Image
        src={study.image}
        alt={study.title}
        width={500}
        height={500}
        className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
      />
      <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
      <div className="absolute bottom-0 left-0 p-6 text-white">
        <h3 className="text-2xl font-bold">{study.title}</h3>
      </div>
    </motion.div>
  );
};

const CaseStudy = ({ data }) => {
  const [selectedStudy, setSelectedStudy] = useState(null);

  if (!data || data.length === 0) {
    return null;
  }

  // Slice the data to get the latest items for different screen sizes
  const latestSeven = data.slice(0, 7);
  const latestFour = data.slice(0, 4);

  return (
    <>
      <section className="case-study-block bg-white lg:py-24 sm:py-20 py-16">
        <div className="container mx-auto px-4">
          <div className="heading text-center max-w-3xl mx-auto mb-16">
            <h2 className="text-4xl md:text-5xl font-bold text-gray-900">
              Our Work in Action
            </h2>
            <p className="body1 mt-4 text-gray-600">
              Explore our success stories and see the tangible results we've
              delivered. Click on a project to see the full story.
            </p>
          </div>

          {/* Staggered Grid Layout for Large Screens (7 items) */}
          <div className="hidden lg:grid grid-cols-3 gap-6">
            {latestSeven.map((study, index) => (
              <div
                key={study.id}
                className={index === 1 || index === 4 ? "row-span-2" : ""}
              >
                <CaseStudyCard
                  study={study}
                  onClick={() => setSelectedStudy(study)}
                />
              </div>
            ))}
          </div>

          {/* Staggered Grid Layout for Medium Screens (4 items) */}
          <div className="hidden sm:grid lg:hidden grid-cols-2 gap-6">
            {latestFour.map((study, index) => (
              <div
                key={study.id}
                className={index === 1 || index === 2 ? "row-span-2" : ""}
              >
                <CaseStudyCard
                  study={study}
                  onClick={() => setSelectedStudy(study)}
                />
              </div>
            ))}
          </div>

          {/* Single Column Layout for Extra Small Screens (4 items) */}
          <div className="grid sm:hidden grid-cols-1 gap-6">
            {latestFour.map((study) => (
              <div key={study.id} className="h-80">
                <CaseStudyCard
                  study={study}
                  onClick={() => setSelectedStudy(study)}
                />
              </div>
            ))}
          </div>

          {/* Add the "See More" button */}
          <div className="text-center mt-16">
            <Link
              href="/case-studies"
              className="inline-block bg-blue-600 text-white font-semibold px-8 py-4 rounded-full text-lg hover:bg-blue-700 transition-colors"
            >
              View All Projects
            </Link>
          </div>
        </div>
      </section>

      {/* Modal */}
      <AnimatePresence>
        {selectedStudy && (
          <CaseStudyModal
            study={selectedStudy}
            closeModal={() => setSelectedStudy(null)}
          />
        )}
      </AnimatePresence>
    </>
  );
};

export default CaseStudy;
