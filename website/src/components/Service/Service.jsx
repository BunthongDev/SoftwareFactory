"use client";
import { motion, Reorder, AnimatePresence } from "framer-motion";
import React, { useState, useEffect } from "react";
import ServiceItem from "./Item/ServiceItem";

const Service = ({ data }) => {
  // Create a state to hold the order of service items
  const [services, setServices] = useState(data);

  // This ensures that if the initial data changes, our state updates
  useEffect(() => {
    setServices(data);
  }, [data]);

  // --- Function to remove a service item ---
  const handleRemoveService = (idToRemove) => {
    setServices(currentServices => currentServices.filter(item => item.id !== idToRemove));
  };

  return (
    <div>
      {/* Main section for the service block */}
      <section
        id="service"
        className="service-block lg:mt-[100px] sm:mt-16 mt-10"
      >
        <div className="container">
          {/* Heading of the services section */}
          <h3 className="heading3 text-center text-[55px]">Our Services</h3>
          <p className="text-center text-gray-500 mt-2 max-w-2xl mx-auto text-[20px]">
    This section is interactive! Feel free to drag, reorder, flip, and close the cards to play around 🛝 🃏
          </p>
          {/* Use Reorder.Group to manage the reordering logic */}
          <Reorder.Group
            axis="x" 
            values={services}
            onReorder={setServices}
            className="list-service grid lg:grid-cols-3 sm:grid-cols-2 gap-8 md:mt-10 mt-6 gap-y-10"
          >
            {/* -- Wrap the list in AnimatePresence for exit animations --- */}
            <AnimatePresence>
              {/* slice card from 0 to 30 */}
              {services.slice(0, 30).map((item, index) => (
                <ServiceItem
                  key={item.id}
                  item={item} 
                  number={index}
                  onRemove={handleRemoveService} // Pass the remove function to each item
                />
              ))}
            </AnimatePresence>
          </Reorder.Group>
        </div>
      </section>
    </div>
  );
};

export default Service;
