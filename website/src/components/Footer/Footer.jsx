import Image from "next/image";
import Link from "next/link";
import React from "react";
import * as Icon from "@phosphor-icons/react/dist/ssr";

// The main Footer component, now accepting a `data` prop
const Footer = ({ data }) => {
  // If no data is passed from the server, render a minimal footer or nothing
  if (!data) {
    return (
      <footer className="bg-[#0f1e33] text-white py-6 text-center">
        <p className="text-sm text-slate-500">© {new Date().getFullYear()} AnajakSoftware. All Rights Reserved.</p>
      </footer>
    );
  }

  // Recreate the social links array dynamically from the fetched data
  const socialLinks = [
    { href: data.socials?.facebook, label: "Facebook", icon: <Icon.FacebookLogoIcon size={26} weight="bold" />, hoverClass: "hover:bg-blue-600" },
    { href: data.socials?.linkedin, label: "LinkedIn", icon: <Icon.LinkedinLogoIcon size={26} weight="bold" />, hoverClass: "hover:bg-blue-700" },
    { href: data.socials?.telegram, label: "Telegram", icon: <Icon.TelegramLogoIcon size={26} weight="bold" />, hoverClass: "hover:bg-sky-500" },
    { href: data.socials?.instagram, label: "Instagram", icon: <Icon.InstagramLogoIcon size={26} weight="bold" />, hoverClass: "hover:bg-pink-600" },
    { href: data.socials?.youtube, label: "YouTube", icon: <Icon.YoutubeLogoIcon size={26} weight="bold" />, hoverClass: "hover:bg-red-600" },
  ];
Icon
  return (
    // Use inline styles for dynamic background and font colors
    <div className="footer-block text-white" style={{ backgroundColor: data.colors?.background, color: data.colors?.font }}>
      <div className="container">
        {/* Section 1: Brand Identity */}
        <div className="flex flex-col items-center gap-6 text-center">
          <Link href="/" className="">
            <Image
              width={450}
              height={150}
              className="transition-opacity hover:opacity-100 mt-5"
              src={data.logo}
              alt="Software Factory Logo"
              priority
            />
          </Link>
          <p className="xl:text-8xl lg:text-8xl md:text-6xl sm:text-5xl text-4xl font-bold xl:leading-[110px] lg:leading-[100px] md:leading-[75px] sm:leading-[55px] leading-[45px]" style={{ color: data.colors?.font }}>
            <Icon.QuotesIcon size={60} weight="fill" className="mb-3 h-12 w-12 text-blue-500 md:h-16 md:w-16" /> {data.slogan}
          </p>
          <div className="my-2 flex items-center gap-3">
            {socialLinks.map((link) => (
              link.href && ( // Only render the icon if a link exists
                <Link
                  key={link.label}
                  href={link.href}
                  target="_blank"
                  rel="noopener noreferrer"
                  className={`item flex h-10 w-10 items-center justify-center rounded-full bg-slate-800 text-slate-300 transition-colors hover:text-white ${link.hoverClass}`}
                  aria-label={link.label}
                >
                  {link.icon}
                </Link>
              )
            ))}
          </div>
        </div>

        {/* Section 3: Telegram CTA */}
        <div className="flex flex-col items-center gap-4 border-t border-slate-700 py-12 text-center">
          <h2 className="text-3xl font-bold">{data.cta?.title}</h2>
          <p className="max-w-lg text-slate-400">
            {data.cta?.description}
          </p>
          <Link
            href={data.cta?.link || "#"}
            target="_blank"
            rel="noopener noreferrer"
            className="mt-4 inline-flex items-center gap-3 rounded-full bg-blue-600 px-8 py-4 text-lg font-semibold text-white transition-colors hover:bg-blue-500 ring-4 ring-white"
          >
            <Icon.TelegramLogoIcon size={24} weight="bold" />
            <span>Join Now</span>
          </Link>
        </div>

        {/* Section 4: Copyright */}
        <div className="border-t border-slate-700 py-6 text-center">
          <p className="text-sm text-slate-500">
            {data.copyright}
          </p>
        </div>
      </div>
    </div>
  );
};

export default Footer;
