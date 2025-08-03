"use client";
import React, { useState, useEffect } from "react"; // <-- Import useState and useEffect
import Image from "next/image";
import Link from "next/link";

// swiper slider library
import { Swiper, SwiperSlide } from "swiper/react";
import { Autoplay, Navigation, Pagination } from "swiper/modules";
import "swiper/css/bundle";

// phosphor icon
import * as Icon from "@phosphor-icons/react/dist/ssr";

const Slider = () => {
  // 1. Create state to store the sliders from your API
  const [sliders, setSliders] = useState([]);

  // 2. Use useEffect to fetch data when the component loads
  useEffect(() => {
    const fetchSliders = async () => {
      try {
        const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/sliders`);
        const data = await res.json();
        // API Resources wrap data in a "data" key, so we use data.data
        setSliders(data.data);
      } catch (error) {
        console.error("Failed to fetch sliders:", error);
      }
    };

    fetchSliders();
  }, []); // The empty array [] means this runs only once

  return (
    <>
      <div className="slider-block">
        <div className="prev-arrow items-center justify-center">
          <Icon.CaretLeftIcon className="text-white heading6" weight="bold" />
        </div>

        <div className="slider-main">
          <Swiper
            spaceBetween={0}
            slidesPerView={1}
            navigation={{
              prevEl: ".prev-arrow",
              nextEl: ".next-arrow",
            }}
            loop={true}
            pagination={{ clickable: true }}
            speed={500}
            modules={[Pagination, Autoplay, Navigation]}
            className="h-full relative"
            autoplay={{
              delay: 4000,
            }}
          >
            {/* 3. Map over the sliders array to dynamically create slides */}
            {sliders.map((slider) => (
              <SwiperSlide key={slider.id}>
                <div className="slider-item slider-first">
                  <div className="bg-img">
                    <Image
                      src={slider.image} // <-- Use dynamic image URL
                      width={1124}
                      height={750}
                      alt={slider.heading} // <-- Use dynamic alt text
                      priority={true}
                      className="w-full h-full object-cover"
                    />
                  </div>

                  <div className="container">
                    <div className="text-content flex-column-between">
                      <div className="relative z-10 text-center px-4 py-16 md:py-24 lg:py-32">
                        <h1 className="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight mb-4 animate-fade-in-up">
                          {/* Gradient text - requires custom CSS or a Tailwind plugin for full browser support,
                but we can simulate with a strong color. For true gradient text, see note below. */}
                          <span className="block text-white">
                            <span className="bg-clip-text text-white drop-shadow-2xl">
                              {slider.heading}
                            </span>
                          </span>
                        </h1>

                        <p className="max-w-3xl mx-auto text-lg md:text-xl text-white font-light mb-8 animate-fade-in-up delay-100 drop-shadow-2xl">
                          {slider.description}
                        </p>
                      </div>

                      <div className="button-block md:mt-10 mt-6">
                        <Link
                          className="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-semibold rounded-full bg-white text-blue-700 hover:bg-gray-100 shadow-xl transition-all duration-300 ease-in-out md:text-lg md:px-10"
                          href={slider.link}
                        >
                          Explore Solutions
                          {/* Optional: Add an icon */}
                          <svg
                            className="ml-2 -mr-1 h-5 w-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                          >
                            <path
                              fillRule="evenodd"
                              d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                              clipRule="evenodd"
                            />
                          </svg>
                        </Link>
                      </div>
                    </div>
                  </div>
                </div>
              </SwiperSlide>
            ))}
          </Swiper>
        </div>

        <div className="next-arrow items-center justify-center">
          <Icon.CaretRightIcon className="text-white heading6" weight="bold" />
        </div>
      </div>
    </>
  );
};

export default Slider;
