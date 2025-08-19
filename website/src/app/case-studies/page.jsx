"use client";

import Footer from "@/components/Footer/Footer";
import Menu from "@/components/Header/Menu/Menu";
import TopNav from "@/components/Header/TopNav/TopNav";
import Partner from "@/components/Partner/Partner";
import React, { useState, useEffect } from "react";
import Image from "next/image";
import Link from "next/link";
import { motion } from "framer-motion";

// Import the data-fetching functions
import { getTopNavData } from "@/lib/data/topnav";
import { getMenuData } from "@/lib/data/menu";
import { getCaseStudies } from "@/lib/data/casestudies";
import { getFooterData } from "@/lib/data/footer"; // 1. Import the footer data function


// A reusable card component for a single case study
const CaseStudyCard = ({ study }) => {
  return (
    <motion.div
      className="bg-white rounded-2xl shadow-lg overflow-hidden group"
      initial={{ opacity: 0, y: 20 }}
      whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: true }}
      transition={{ duration: 0.5 }}
    >
      <div className="relative h-56">
        <Image
          src={study.image}
          alt={study.title}
          fill
          className="object-cover group-hover:scale-105 transition-transform duration-300 ease-in-out"
        />
      </div>
      <div className="p-6 flex flex-col flex-grow">
        <h3 className="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">
          {study.title}
        </h3>
        <p className="text-gray-600 mb-4 flex-grow">{study.description}</p>
      </div>
    </motion.div>
  );
};

const CaseStudiesPage = () => {
  // State to hold the data fetched on the client
  const [liveTopNavData, setLiveTopNavData] = useState(null);
  const [liveMenuData, setLiveMenuData] = useState(null);
  const [allCaseStudies, setAllCaseStudies] = useState([]);
  const [liveFooterData, setLiveFooterData] = useState(null); // 2. Add state for footer data

  useEffect(() => {
    // Fetch all data inside a useEffect hook
    const fetchData = async () => {
      const [navData, menuData, studiesData, footerData] = await Promise.all([ // 3. Fetch footer data
        getTopNavData(),
        getMenuData(),
        getCaseStudies(),
        getFooterData(),
      ]);
      setLiveTopNavData(navData);
      setLiveMenuData(menuData);
      setAllCaseStudies(studiesData);
      setLiveFooterData(footerData); // 4. Set the footer data state
    };
    fetchData();
  }, []); // Empty dependency array ensures this runs only once

  return (
    <div className="overflow-x-hidden">
      <header id="header">
        <TopNav data={liveTopNavData} />
        <Menu data={liveMenuData} />
      </header>

      <main className="content">
        <section className="bg-slate-50 py-24 sm:py-32">
          <div className="container mx-auto px-4">
            <div className="text-center mb-16 max-w-3xl mx-auto">
              <h1 className="text-4xl md:text-5xl font-bold text-gray-900">
                Client's Success is Our Goal 🏆
              </h1>
              <p className="mt-4 text-lg text-gray-600">
                We deliver results. Explore our case studies to see how we build innovative solutions that drive measurable growth.
              </p>
            </div>

            {/* Grid layout for all case studies */}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              {allCaseStudies.length > 0 ? (
                allCaseStudies.map((study) => (
                  <CaseStudyCard key={study.id} study={study} />
                ))
              ) : (
                // Optional: Show a loading state
                <p className="col-span-full text-center">Loading case studies...</p>
              )}
            </div>
          </div>
        </section>
      </main>

      <Partner className="lg:mt-[100px] sm:mt-16 mt-10" />
      {/* 5. Pass the live data to the Footer component */}
      <footer id="footer">
        <Footer data={liveFooterData} />
      </footer>
    </div>
  );
};

export default CaseStudiesPage;
