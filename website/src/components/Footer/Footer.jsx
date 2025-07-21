import Image from "next/image";
import Link from "next/link";
import React from "react";
import * as Icon from "@phosphor-icons/react/dist/ssr";

const Footer = () => {
  return (
    <div className="footer-block bg-[#0f1e33] pt-[60px]">
      <div className="container">
        <div className="flex max-lg:flex-col max-lg:items-start gap-y-10 pb-10">
          <div className="lg:w-1/4">
            <div className="footer-company-infor flex flex-col gap-5">
              <Image
                width={145} // More appropriate width for the container
                height={40} // Maintain aspect ratio
                className="footer-logo w-[145px] h-auto" // Use h-auto for responsiveness
                src="/images/Software-Factory-Logo.png"
                alt="Software Factory Logo" // Added alt text for accessibility
              />
              <div className="text caption1 text-white/80">
                {" "}
                {/* Slightly muted text for better hierarchy */}
                The jobs report soundly beat expectations, with job gains
                broadly spread across the economy and about 60% higher
              </div>

              {/* === ICON REFACTOR START === */}
              <div className="list-social flex items-center gap-3">
                {" "}
                {/* Increased gap slightly */}
                <Link
                  href="https://www.facebook.com/"
                  target="_blank"
                  className="item flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-blue-600"
                  aria-label="Facebook"
                >
                  <Icon.FacebookLogoIcon size={20} weight="fill" />
                </Link>
                <Link
                  href="https://www.linkedin.com/"
                  target="_blank"
                  className="item flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-blue-700"
                  aria-label="LinkedIn"
                >
                  <Icon.LinkedinLogoIcon size={20} weight="fill" />
                </Link>
                <Link
                  href="https://www.x.com/"
                  target="_blank"
                  className="item flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-black"
                  aria-label="X (formerly Twitter)"
                >
                  <Icon.XLogoIcon size={20} weight="fill" />
                </Link>
                <Link
                  href="https://www.youtube.com/"
                  target="_blank"
                  className="item flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-red-600"
                  aria-label="YouTube"
                >
                  <Icon.YoutubeLogoIcon size={20} weight="fill" />
                </Link>
                <Link
                  href="https://www.instagram.com/"
                  target="_blank"
                  className="item flex h-9 w-9 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-pink-600"
                  aria-label="Instagram"
                >
                  <Icon.InstagramLogoIcon size={20} weight="fill" />
                </Link>
              </div>
              {/* === ICON REFACTOR END === */}
            </div>
          </div>

          {/* ... other footer columns would go here ... */}
        </div>
      </div>
    </div>
  );
};

export default Footer;
