"use client";
import React from "react"; // 1. Removed useEffect and useState
import Image from "next/image";
import Link from "next/link";
import { Swiper, SwiperSlide } from "swiper/react";
import { Autoplay, Navigation, Pagination } from "swiper/modules";
import "swiper/css/bundle";
import * as Icon from "@phosphor-icons/react/dist/ssr";

// 2. Receive the pre-fetched 'data' as a prop
export default function Slider({ data }) {
  // 3. REMOVED the useEffect for data fetching and the loading state.

  // If there's no data, don't render anything.
  if (!data || data.length === 0) {
    return null;
  }

  return (
    <div className="slider-block">
      <div className="prev-arrow items-center justify-center">
        <Icon.CaretLeftIcon size={24} className="text-white" weight="bold" />
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
          {data.map((slider) => (
            <SwiperSlide key={slider.id}>
              <div className="slider-item slider-first">
                <div className="bg-img">
                  <Image
                    src={slider.image}
                    width={1124}
                    height={750}
                    alt={slider.heading || "slider image"}
                    priority={true}
                    className="w-full h-full object-cover"
                  />
                </div>

                <div className="container">
                  <div className="text-content flex-column-between">
                    <div className="relative z-10 text-center px-4 py-16 md:py-24 lg:py-32">
                      <h1 className="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight mb-4 animate-fade-in-up">
                        <span className="block">
                          <span className="bg-clip-text text-black">
                            {slider.heading}
                          </span>
                        </span>
                      </h1>
                      <p className="max-w-3xl mx-auto text-lg md:text-xl text-black font-light mb-8 animate-fade-in-up delay-100">
                        {slider.description}
                      </p>
                    </div>

                    <div className="button-block md:mt-10 mt-6">
                      <Link
                        className="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-semibold rounded-full bg-white text-blue-700 hover:bg-gray-100 shadow-xl transition-all duration-300 ease-in-out md:text-lg md:px-10"
                        href={slider.link || "#"}
                      >
                        Explore Solutions
                        <Icon.ArrowRightIcon size={20} className="ml-2" />
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
        <Icon.CaretRightIcon size={24} className="text-white" weight="bold" />
      </div>
    </div>
  );
}