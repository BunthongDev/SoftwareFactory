"use client";
import React from "react"; // Removed useEffect and useState
import Image from "next/image";

// This is your original TestimonialCard component - the style is preserved.
const TestimonialCard = ({ testimonial }) => {
  return (
    <div className="w-full p-6 bg-white rounded-2xl shadow-lg border-2 border-gray-600 flex flex-col">
      <div className="flex items-center gap-4 mb-4">
        <Image
          src={
            testimonial.avatar || "/images/AnajakSoftware-page-not-found.png"
          }
          width={50}
          height={50}
          alt={testimonial.name || "avatar"}
          className="flex-shrink-0 rounded-full border-2 border-gray-400 w-24 h-24"
        />
        <div>
          <strong className="font-semibold text-gray-900">
            {testimonial.name}
          </strong>
          <span className="block text-sm text-gray-500">
            {testimonial.role}
          </span>
        </div>
      </div>
      <p className="text-gray-600 italic font-semibold">
        “{testimonial.quote}”
      </p>
    </div>
  );
};

// This component is also unchanged.
const TestimonialColumn = ({
  testimonials,
  reverse = false,
  className = "",
}) => {
  const combinedTestimonials = [...testimonials, ...testimonials];
  return (
    <div
      className={`flex flex-col gap-8 ${className} ${
        reverse ? "animate-scroll-reverse" : "animate-scroll-normal"
      }`}
    >
      {combinedTestimonials.map((testimonial, index) => (
        <TestimonialCard
          key={`${testimonial.id || index}-${index}`}
          testimonial={testimonial}
        />
      ))}
    </div>
  );
};

// 1. The component now receives 'data' as a prop
export default function Testimonial({ data: testimonialData }) {
  // 2. All data fetching and loading states are removed.

  // If the server provides no data, don't render the section.
  if (!testimonialData || testimonialData.length === 0) {
    return null;
  }

  // The logic to split testimonials into columns remains the same.
  const third = Math.ceil(testimonialData.length / 3);
  const column1 = testimonialData.slice(0, third);
  const column2 = testimonialData.slice(third, third * 2);
  const column3 = testimonialData.slice(third * 2);

  // 3. The JSX structure, styles, and animation
  return (
    <>
      <style jsx global>{`
        @keyframes scroll {
          from {
            transform: translateY(0);
          }
          to {
            transform: translateY(-50%);
          }
        }
        .animate-scroll-normal {
          animation: scroll 40s linear infinite;
        }
        .animate-scroll-reverse {
          animation: scroll 30s linear infinite reverse;
        }
      `}</style>

      <section className="bg-slate-50 py-24 sm-py-32">
        <div className="container mx-auto px-4">
          <div className="text-center mb-20 max-w-3xl mx-auto ">
            <h2 className="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
              Trusted By Professionals
            </h2>
            <p className="mt-4 text-xl leading-8 text-gray-600">
              Hear what our clients have to say about our work and commitment to
              excellence.
            </p>
          </div>

          <div className="relative h-[600px] md:h-[800px] overflow-hidden">
            <div className="absolute inset-0 [mask-image:linear-gradient(to_bottom,transparent,black_10%,black_90%,transparent)]">
              <div className="absolute inset-x-0 top-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <TestimonialColumn testimonials={column1} />
                <TestimonialColumn
                  testimonials={column2}
                  reverse={true}
                  className="hidden sm:flex"
                />
                <TestimonialColumn
                  testimonials={column3}
                  className="hidden lg:flex"
                />
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}
