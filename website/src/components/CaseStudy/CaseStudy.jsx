"use client";

import React from "react";
import Image from "next/image";
import { motion } from "framer-motion";

// All 6 of your case studies are included
const caseStudiesData = [
  {
    id: 1,
    title: "Project Titan: A Next-Gen Game Launch",
    description:
      "See how we took a gaming concept from initial design to a successful, scalable launch on multiple platforms.",
    image: "/images/caseone.webp",
    link: "/case-studies/project-titan-game-dev",
  },
  {
    id: 2,
    title: "FinApp: Secure Mobile Banking Solution",
    description:
      "We partnered with a leading fintech firm to build a high-performance mobile app that boosted user engagement by 40%.",
    image: "/images/caseone.webp",
    link: "/case-studies/finapp-mobile-banking",
  },
  {
    id: 3,
    title: "E-Commerce Website Overhaul for StyleHub",
    description:
      "A complete redesign and development of an e-commerce site, resulting in a 60% increase in conversions.",
    image: "/images/caseone.webp",
    link: "/case-studies/stylehub-ecommerce",
  },
  {
    id: 4,
    title: "Automated Logistics System for SupplyCo",
    description:
      "We engineered a robust software system that streamlined operations and reduced processing time by 50%.",
    image: "/images/caseone.webp",
    link: "/case-studies/supplyco-logistics-system",
  },
  {
    id: 5,
    title: "HealthTrack: An Intuitive UI/UX Redesign",
    description:
      "Our user-centric design process transformed the HealthTrack app, leading to a 5-star rating on the app store.",
    image: "/images/caseone.webp",
    link: "/case-studies/healthtrack-ui-ux",
  },
  {
    id: 6,
    title: "Data-Driven Growth for Marketly",
    description:
      "Unlocking actionable insights from complex datasets to drive marketing strategy and increase client ROI by 35%.",
    image: "/images/caseone.webp",
    link: "/case-studies/marketly-data-analytics",
  },
];

// To create a seamless loop, we duplicate the data
const duplicatedStudies = [...caseStudiesData, ...caseStudiesData];

const CaseStudy = () => {
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
                      width={800}
                      height={600}
                      className="w-full h-48 object-cover"
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
