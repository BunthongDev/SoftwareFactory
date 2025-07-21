import React from "react";
import * as Icon from "@phosphor-icons/react/dist/ssr";
import Link from "next/link";

// Refactor: Social links are now generated from this array.
// This makes it much easier to add, remove, or update links.
const socialLinks = [
  {
    href: "https://www.facebook.com/your-page",
    label: "Facebook",
    icon: <Icon.FacebookLogoIcon size={23} weight="bold" />,
  },
  {
    href: "https://www.linkedin.com/your-profile",
    label: "LinkedIn",
    icon: <Icon.LinkedinLogoIcon size={23} weight="bold" />,
  },
  {
    href: "https://www.x.com/your-handle",
    label: "X (formerly Twitter)",
    icon: <Icon.XLogoIcon size={23} weight="bold" />,
  },
  {
    href: "https://www.instagram.com/your-account",
    label: "Instagram",
    icon: <Icon.InstagramLogoIcon size={23} weight="bold" />,
  },
  {
    href: "https://www.youtube.com/your-channel",
    label: "YouTube",
    icon: <Icon.YoutubeLogoIcon size={23} weight="bold" />,
  },
];

const TopNav = () => {
  return (
    <div className="bg-slate-700">
      <div className="container flex h-[44px] items-center justify-end sm:justify-between">
        {/* This block is HIDDEN on mobile and VISIBLE on sm screens and up */}
        <div className="left-block hidden items-center gap-x-6 text-sm sm:flex">
          <div className="location hidden items-center gap-x-2 text-white/80 lg:flex">
            <Icon.MapPinIcon size={23} />
            <span>Street 2011, #290 Borey MekongLand, Phnom Penh</span>
          </div>
          <Link
            href="mailto:support@softwarefactory.com"
            className="mail flex items-center gap-x-2 text-white/80 transition-colors hover:text-white"
          >
            <Icon.EnvelopeSimpleIcon size={23} />
            <span className="hidden sm:inline">
              support@softwarefactory.com
            </span>
          </Link>
        </div>

        {/* Social icons rendered from the array */}
        <div className="right-block flex items-center gap-x-4">
          <div className="line hidden h-5 w-px bg-white/20 sm:block"></div>
          <div className="list-social flex items-center gap-x-2">
            {socialLinks.map((link) => (
              <Link
                key={link.label}
                href={link.href}
                target="_blank"
                aria-label={link.label}
                className="flex h-8 w-8 items-center justify-center rounded-full text-white/70 transition-colors hover:bg-white/10 hover:text-white"
              >
                {link.icon}
              </Link>
            ))}
          </div>
        </div>
      </div>
    </div>
  );
};

export default TopNav;
