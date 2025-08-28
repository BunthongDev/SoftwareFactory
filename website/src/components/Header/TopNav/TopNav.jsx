import React from "react";
import Link from "next/link";
import {
  MapPin,
  EnvelopeSimple,
  FacebookLogo,
  LinkedinLogo,
  InstagramLogo,
  YoutubeLogo,
  TelegramLogo,
  XLogo,
} from "@phosphor-icons/react/dist/ssr";

// Icon resolver: supports official names and short/legacy keys
const iconComponents = {
  FacebookLogo: FacebookLogo,
  facebook: FacebookLogo,
  Facebook: FacebookLogo,

  LinkedinLogo: LinkedinLogo,
  linkedin: LinkedinLogo,
  LinkedIn: LinkedinLogo,

  InstagramLogo: InstagramLogo,
  instagram: InstagramLogo,
  Instagram: InstagramLogo,

  YoutubeLogo: YoutubeLogo,
  youtube: YoutubeLogo,
  YouTube: YoutubeLogo,

  TelegramLogo: TelegramLogo,
  telegram: TelegramLogo,
  Telegram: TelegramLogo,

  XLogo: XLogo,
  x: XLogo,
  X: XLogo,
  TwitterLogo: XLogo, // legacy
  twitter: XLogo,
  Twitter: XLogo,
};

function getIconComponent(key) {
  if (!key) return null;
  return (
    iconComponents[key] || iconComponents[String(key).toLowerCase()] || null
  );
}

function truthy(v) {
  return v === true || v === 1 || v === "1" || v === "true" || v === "on";
}

function normalizeLinks(data) {
  if (!data) return [];

  // If API already provides the array, just pass it through
  if (Array.isArray(data.social_links))
    return data.social_links.filter(Boolean);

  // Otherwise, build from *_url + *_status fields from the backend
  const rows = [
    {
      urlKey: "facebook_url",
      statusKey: "facebook_status",
      icon: "FacebookLogo",
      label: "Facebook",
    },
    {
      urlKey: "linkedin_url",
      statusKey: "linkedin_status",
      icon: "LinkedinLogo",
      label: "LinkedIn",
    },
    {
      urlKey: "twitter_url",
      statusKey: "twitter_status",
      icon: "XLogo",
      label: "X",
    }, // Twitter → X
    {
      urlKey: "instagram_url",
      statusKey: "instagram_status",
      icon: "InstagramLogo",
      label: "Instagram",
    },
    {
      urlKey: "youtube_url",
      statusKey: "youtube_status",
      icon: "YoutubeLogo",
      label: "YouTube",
    },
    {
      urlKey: "telegram_url",
      statusKey: "telegram_status",
      icon: "TelegramLogo",
      label: "Telegram",
    },
  ];

  return rows
    .map((r) => {
      const href = data[r.urlKey];
      const on = truthy(data[r.statusKey]);
      if (!on || !href) return null;
      return { icon: r.icon, label: r.label, href };
    })
    .filter(Boolean);
}

export default function TopNav({ data }) {
  const links = normalizeLinks(data);

  if (!data) return null;

  return (
    <div className="bg-slate-700">
      <div className="container flex h-[44px] items-center justify-end sm:justify-between">
        <div className="left-block hidden items-center gap-x-6 text-sm sm:flex">
          {data.address && (
            <div className="location hidden items-center gap-x-2 text-white/80 lg:flex">
              <MapPin size={20} />
              <span>{data.address}</span>
            </div>
          )}
          {data.email && (
            <Link
              href={`mailto:${data.email}`}
              className="mail flex items-center gap-x-2 text-white/80 transition-colors hover:text-white"
            >
              <EnvelopeSimple size={20} />
              <span className="hidden sm:inline">{data.email}</span>
            </Link>
          )}
        </div>

        <div className="right-block flex items-center gap-x-4">
          <div className="line hidden h-5 w-px bg-white/20 sm:block" />
          <div className="list-social flex items-center gap-x-2">
            {links.map((link) => {
              const Icon = getIconComponent(link.icon);
              if (!Icon) return null;
              return (
                <Link
                  key={link.label || link.href}
                  href={link.href}
                  target="_blank"
                  rel="noopener noreferrer"
                  aria-label={link.label}
                  title={link.label}
                  className="flex h-8 w-8 items-center justify-center rounded-full text-white/70 transition-colors hover:bg-white/10 hover:text-white"
                >
                  <Icon size={18} weight="bold" />
                </Link>
              );
            })}
          </div>
        </div>
      </div>
    </div>
  );
}
