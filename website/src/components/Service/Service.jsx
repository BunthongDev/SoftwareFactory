"use client";
import React, { useState } from "react"; // 1. Removed useEffect
import { Reorder, AnimatePresence } from "framer-motion";
import ServiceItem from "./Item/ServiceItem";

// 2. Receive 'initialServices' as a prop
export default function Service({ initialServices }) {
  // 3. Use the prop to set the initial state. No more fetching or loading state needed.
  const [services, setServices] = useState(initialServices || []);

  const handleRemoveService = (idToRemove) => {
    setServices((current) => current.filter((s) => s.id !== idToRemove));
  };

  if (!services || services.length === 0) {
    // This will now only show if the server provides no services
    return (
      <section id="service" className="service-block py-12">
        <div className="container text-center">
          <p>No services available.</p>
        </div>
      </section>
    );
  }

  return (
    <section
      id="service"
      className="service-block lg:mt-[100px] sm:mt-16 mt-10 mb-10"
    >
      <div className="container">
        <h3 className="heading3 text-center text-[55px]">Our Services</h3>
        <p className="text-center text-gray-500 mt-2 max-w-2xl mx-auto text-[20px]">
          This section is interactive! Feel free to drag, reorder, flip, and
          close the cards to play around 🛝 🃏
        </p>

        <Reorder.Group
          axis="x"
          values={services}
          onReorder={setServices}
          className="list-service grid lg:grid-cols-3 sm:grid-cols-2 gap-8 md:mt-10 mt-6 gap-y-10"
        >
          <AnimatePresence>
            {services.slice(0, 30).map((item, index) => (
              <ServiceItem
                key={item.id}
                item={item}
                number={index}
                onRemove={handleRemoveService}
              />
            ))}
          </AnimatePresence>
        </Reorder.Group>
      </div>
    </section>
  );
}
