import Image from "next/image";
import Link from "next/link";
import React from "react";
import * as Icon from "@phosphor-icons/react/dist/ssr";

// Data for the footer links. Edit here to change the footer navigation.
const footerLinks = [
  {
    title: "Company",
    links: [
      { label: "About Us", href: "/about" },
      { label: "Our Team", href: "/team" },
      { label: "Careers", href: "/careers" },
      { label: "Contact Us", href: "/contact" },
    ],
  },
  {
    title: "Services",
    links: [
      { label: "Web Development", href: "/services/web" },
      { label: "Mobile Apps", href: "/services/mobile" },
      { label: "Game Development", href: "/services/game-development" },
      { label: "UI/UX Design", href: "/services/uxui-design" },
      {
        label: "Software System",
        href: "/services/software-system-development",
      },
      { label: "Data Analytics", href: "/services/data-analytics" },
    ],
  },
  {
    title: "Resources",
    links: [
      { label: "Blog", href: "/blog" },
      { label: "Case Studies", href: "/case-studies" },
      { label: "Help Center", href: "/help" },
      { label: "White Papers", href: "/resources/papers" },
    ],
  },
];

// Dynamic social link
const socialLinks = [
  {
    href: "https://www.facebook.com/",
    label: "Facebook",
    icon: <Icon.FacebookLogoIcon size={26} weight="bold" />,
    hoverClass: "hover:bg-blue-600",
  },
  {
    href: "https://www.linkedin.com/",
    label: "LinkedIn",
    icon: <Icon.LinkedinLogoIcon size={26} weight="bold" />,
    hoverClass: "hover:bg-blue-700",
  },
  {
    href: "https://www.x.com/",
    label: "X",
    icon: <Icon.XLogoIcon size={26} weight="bold" />,
    hoverClass: "hover:bg-black",
  },
  {
    href: "https://www.instagram.com/",
    label: "Instagram",
    icon: <Icon.InstagramLogoIcon size={26} weight="bold" />,
    hoverClass: "hover:bg-pink-600",
  },
  {
    href: "https://www.youtube.com/",
    label: "YouTube",
    icon: <Icon.YoutubeLogoIcon size={26} weight="bold" />,
    hoverClass: "hover:bg-red-600",
  },
];

const Footer = () => {
  return (
    <div className="footer-block bg-[#0f1e33] text-white">
      <div className="container">
        {/* Section 1: Brand Identity */}
        <div className="flex flex-col items-center gap-6 text-center">
          <Link href="/" className="">
            <Image
              width={450}
              height={150}
              className="transition-opacity hover:opacity-100 mt-5"
              src="/images/Software-Factory-Logo.png"
              alt="Software Factory Logo"
              priority
            />
          </Link>
          <p className="text-lg text-white text-[30px] font-bold">
            Value your time by using great software.😊
          </p>
          <div className="my-2 flex items-center gap-3">
            {socialLinks.map((link) => (
              <Link
                key={link.label}
                href={link.href}
                target="_blank"
                className={`item flex h-10 w-10 items-center justify-center rounded-full bg-slate-800 text-slate-300 transition-colors hover:text-white ${link.hoverClass}`}
                aria-label={link.label}
              >
                {link.icon}
              </Link>
            ))}
          </div>
        </div>

        {/* Section 2: Main Navigation Grid */}
        <div className="grid grid-cols-2 gap-8 border-t border-slate-700 py-12 md:grid-cols-3">
          {footerLinks.map((column) => (
            <div
              key={column.title}
              className="footer-nav-item text-center md:text-left"
            >
              <h3 className="mb-4 font-semibold text-white">{column.title}</h3>
              <ul className="space-y-3">
                {column.links.map((link) => (
                  <li key={link.label}>
                    <Link
                      className="text-slate-300 transition-colors hover:text-white hover:underline"
                      href={link.href}
                    >
                      {link.label}
                    </Link>
                  </li>
                ))}
              </ul>
            </div>
          ))}
        </div>

        {/* Section 3: Newsletter CTA */}
        <div className="flex flex-col items-center gap-4 border-t border-slate-700 py-12 text-center">
          <h2 className="text-3xl font-bold">Join Our Newsletter</h2>
          <p className="max-w-lg text-slate-400">
            Get insights on tech, project management, and business growth
            delivered straight to your inbox. No spam, ever.
          </p>
          <form
            className="mt-4 flex w-full max-w-lg items-center overflow-hidden rounded-full border border-slate-700 bg-slate-800/50 focus-within:ring-2 focus-within:ring-blue-500"
            action=""
          >
            <input
              className="h-14 flex-grow border-0 bg-transparent px-6 text-white placeholder-slate-400 focus:outline-none"
              type="email"
              placeholder="Your best email address"
            />
            <button
              type="submit"
              className="m-1 flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-600 transition-colors hover:bg-blue-500"
              aria-label="Subscribe"
            >
              <Icon.PaperPlaneRightIcon size={22} weight="fill" />
            </button>
          </form>
        </div>

        {/* Section 4: Copyright */}
        <div className="border-t border-slate-700 py-6 text-center">
          <p className="text-sm text-slate-500">
            © {new Date().getFullYear()} SoftwareFactory. All Rights Reserved.
            Located in Phnom Penh | Cambodia.{" "}
            <Link
              href="/privacy-policy"
              className="ml-1 underline hover:text-white"
            >
              Privacy Policy
            </Link>
            .
          </p>
        </div>
      </div>
    </div>
  );
};

export default Footer;
