import React from "react";
import Link from "next/link";
import * as Icon from "@phosphor-icons/react/dist/ssr";

export default function ContactLinkCard({ link }) {
  // Dynamically selects an icon from the library based on the `link.icon` string from the API, defaulting to a generic `LinkIcon` if not found.
  const IconComponent = Icon[link?.icon] || Icon.LinkIcon;

  return (
    <Link
      href={link?.href || "#"}
      target="_blank"
      rel="noopener noreferrer"
      className={`bg-slate-50 p-8 rounded-2xl border text-center group ${
        link?.hoverClass || "hover:bg-blue-600"
      } hover:text-white transition-all duration-300 w-full sm:w-64 flex flex-col items-center justify-center h-48`}
    >
      <div className="flex justify-center text-blue-600 group-hover:text-white transition-colors duration-300 font-bold">
        <IconComponent size={42} />
      </div>
      <h3 className="mt-4 text-xl font-bold text-gray-900 group-hover:text-white transition-colors duration-300">
        {link?.title || "Contact"}
      </h3>
      <p className="mt-1 text-gray-500 group-hover:text-blue-200 transition-colors duration-300 break-words">
        {link?.detail || ""}
      </p>
    </Link>
  );
}