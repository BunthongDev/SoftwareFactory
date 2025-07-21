import Image from "next/image";
import Link from "next/link";
import React from "react";

const Partner = () => {
  return (
    <div className="cta-block relative lg:h-[120px] h-[180px]">
      <div className="container flex items-center justify-between max-lg:flex-col max-lg:justify-center gap-6 h-full bg-blue-600">
        <div className="heading5 max-lg:text-center text-white">
          Let's Build the Technology That Drives Your Business.
        </div>
        <Link
          className="button-main rounded-full hover:bg-black hover:text-white bg-white text-button px-9 py-3"
          href="/"
        >
          Get my free quote
        </Link>
      </div>
    </div>
  );
};

export default Partner;
