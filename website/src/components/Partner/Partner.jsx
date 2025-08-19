import Image from "next/image";
import Link from "next/link";
import React from "react";

const Partner = () => {
  return (
    // Start call to action banner
    <div className="cta-block w-full bg-blue-600 py-10 lg:py-0">
      <div className="container flex h-full min-h-[120px] items-center justify-between max-lg:flex-col max-lg:justify-center max-lg:py-8 lg:gap-6">
        <div className="heading5 max-lg:text-center text-white">
          Let's Build the Technology That Drives Your Business.
        </div>
        <Link
          
          href="/contact-us"
          className="button-main flex-shrink-0 rounded-full bg-white px-9 py-3 text-button hover:bg-black hover:text-white max-lg:mt-6"
        >
          Contact Us Now
        </Link>
      </div>
    </div>
  );
};

export default Partner;
