"use client";
import React from "react"; // We no longer need useState or useEffect
import Image from "next/image";
import Link from "next/link";

// swiper slider library
import { Swiper, SwiperSlide } from "swiper/react";
import { Autoplay, Navigation, Pagination } from "swiper/modules";
import "swiper/css/bundle";

// phosphor icon
import * as Icon from "@phosphor-icons/react/dist/ssr";

// The component now accepts the 'data' directly as a prop
const Slider = ({ data }) => {
  // We check if data exists. If not (e.g., API fails), we render nothing.
  if (!data || data.length === 0) {
    return null;
  }

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
            {/* Map over the 'data' prop directly */}
            {data.map((slider) => (
              <SwiperSlide key={slider.id}>
                <div className="slider-item slider-first">
                  <div className="bg-img">
                    <Image
                      src={slider.image}
                      width={1124}
                      height={750}
                      alt={slider.heading}
                      priority={true}
                      className="w-full h-full object-cover"
                    />
                  </div>

                  <div className="container">
                    <div className="text-content flex-column-between">
                      <div className="relative z-10 text-center px-4 py-16 md:py-24 lg:py-32">
                        <h1 className="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight mb-4 animate-fade-in-up">
                          <span className="block">
                            <span className="bg-clip-text text-black ">
                              {slider.heading}
                            </span>
                          </span>
                        </h1>

                        <p className="max-w-3xl mx-auto text-lg md:text-xl text-black font-light mb-8 animate-fade-in-up delay-100 ">
                          {slider.description}
                        </p>
                      </div>

                      <div className="button-block md:mt-10 mt-6">
                        <Link
                          className="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-semibold rounded-full bg-white text-blue-700 hover:bg-gray-100 shadow-xl transition-all duration-300 ease-in-out md:text-lg md:px-10"
                          href={slider.link || "#"} // Add a fallback for the link
                        >
                          Explore Solutions
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
