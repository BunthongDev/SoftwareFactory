import React from "react";
import * as Icon from "@phosphor-icons/react/dist/ssr";
import Link from "next/link";

// This object maps the icon names from API to the actual React components.
const iconComponents = {
  FacebookLogoIcon: Icon.FacebookLogoIcon,
  LinkedinLogoIcon: Icon.LinkedinLogoIcon,
  XLogoIcon: Icon.XLogoIcon,
  InstagramLogoIcon: Icon.InstagramLogoIcon,
  YoutubeLogoIcon: Icon.YoutubeLogoIcon,
  TelegramLogoIcon: Icon.TelegramLogoIcon,
};

// Accept `data` as a prop
const TopNav = ({ data }) => {
  // If there's no data, don't render the component to avoid errors
  if (!data) {
    return null;
  }

  return (
    <div className="bg-slate-700">
      <div className="container flex h-[44px] items-center justify-end sm:justify-between">
        {/* Left block with dynamic data */}
        <div className="left-block hidden items-center gap-x-6 text-sm sm:flex">
          {data.address && (
            <div className="location hidden items-center gap-x-2 text-white/80 lg:flex">
              <Icon.MapPinIcon size={23} />
              <span>{data.address}</span>
            </div>
          )}
          {data.email && (
            <Link
              href={`mailto:${data.email}`}
              className="mail flex items-center gap-x-2 text-white/80 transition-colors hover:text-white"
            >
              <Icon.EnvelopeSimpleIcon size={23} />
              <span className="hidden sm:inline">{data.email}</span>
            </Link>
          )}
        </div>

        {/* Right block with dynamic social links */}
        <div className="right-block flex items-center gap-x-4">
          <div className="line hidden h-5 w-px bg-white/20 sm:block"></div>
          <div className="list-social flex items-center gap-x-2">
            {data.social_links?.map((link) => {
              // Get the correct icon component from the map
              const IconComponent = iconComponents[link.icon];
              if (!IconComponent) return null; // Skip if icon doesn't exist

              return (
                <Link
                  key={link.label}
                  href={link.href}
                  target="_blank"
                  aria-label={link.label}
                  className="flex h-8 w-8 items-center justify-center rounded-full text-white/70 transition-colors hover:bg-white/10 hover:text-white"
                >
                  <IconComponent size={23} weight="bold" />
                </Link>
              );
            })}
          </div>
        </div>
      </div>
    </div>
  );
};

export default TopNav;