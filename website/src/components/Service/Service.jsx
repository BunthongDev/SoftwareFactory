'use client'
import { useInView } from "framer-motion";
import React, { useRef } from "react";
import ServiceItem from "./Item/ServiceItem";

const Service = ({ data }) => {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true });

  return (
    <div>
        {/* Main section for the service block  */}
      <section id="service" className="service-block lg:mt-[100px] sm:mt-16 mt-10" ref={ref}>
        <div className="container">
            {/* Heading of the services section */}
          <h3 className="heading3 text-center">Our Services</h3>
          {/* Container for the list of service items */}
          <div
            className="list-service grid lg:grid-cols-3 sm:grid-cols-2 gap-8 md:mt-10 mt-6 gap-y-10"
            style={{
              transform: isInView ? "none" : "translateY(60px)",
              opacity: isInView ? 1 : 0, 
              // Define the transition properties for a smooth animation effect
              transition: 'all 0.7s cubic-bezier(0.17, 0.55, 0.55,1) 0.3s'
              
            }}
          >
            {
                // Map through the 'data' array to render each ServiceItem.
                // .slice(0, 6) ensures only the first 6 items from the data array are rendered.
                data.slice(0.6).map((item, index) => (
                    <ServiceItem data={item} key={index} number={index} />
                ) )    
            }
            
            </div>
        </div>
      </section>
    </div>
  );
};

export default Service;
