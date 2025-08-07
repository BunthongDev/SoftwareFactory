"use client";

import React from "react";
import Image from "next/image";
import { motion } from "framer-motion";

// Accept `data` as a prop instead of using hardcoded data
const CaseStudy = ({ data }) => {
  // If there's no data or it's empty, don't render anything
  if (!data || data.length === 0) {
    return null;
  }

  // To create a seamless loop, we duplicate the fetched data
  const duplicatedStudies = [...data, ...data];

  return (
    <section className="case-study-block bg-white lg:py-24 sm:py-20 py-16">
      <div className="container">
        <div className="heading text-center max-w-2xl mx-auto mb-12">
          <h2 className="heading2 font-bold text-gray-900">
            Our Work in Action
          </h2>
          <p className="body1 mt-4 text-gray-600">
            Explore our success stories and see the tangible results we've
            delivered. The animation pauses on hover.
          </p>
        </div>
      </div>

      {/* Marquee Container */}
      <div className="w-full overflow-hidden group">
        <div className="flex animate-marquee group-hover:[animation-play-state:paused] will-change-transform">
          {duplicatedStudies.map((study, index) => (
            <div
              key={index}
              className="flex-shrink-0 mx-4"
              style={{ width: "clamp(300px, 40vw, 450px)" }}
            >
              <motion.div
                whileHover={{ y: -8 }}
                transition={{ duration: 0.3 }}
                className="h-full"
              >
                {/* Case studies card  */}
                <div className="block h-full bg-gray-50 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 flex-col border-solid border-2 border-black hover:border-gray-300">
                  <div className="image-wrapper overflow-hidden">
                    <Image
                      width={500}
                      height={350}
                      className="w-full h-48 object-cover"
                      // Use the 'image_url' from your API response
                      src={study.image}
                      alt={study.title}
                    />
                  </div>
                  <div className="text p-6 flex flex-col flex-grow">
                    <h3 className="heading5 font-semibold text-gray-800">
                      {study.title}
                    </h3>
                    <p className="body2 mt-2 text-gray-500 flex-grow">
                      {study.description}
                    </p>
                  </div>
                </div>
              </motion.div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default CaseStudy;
