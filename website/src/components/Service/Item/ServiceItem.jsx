import Link from "next/link";
import React from "react";
import * as PhosphorIcons from "@phosphor-icons/react"; // Import all Phosphor Icons

const ServiceItem = ({ data, number }) => {
  console.log(data);

  // Dynamically get the Phosphor Icon component based on the 'icon' string
  const IconComponent = PhosphorIcons[data.icon];

  return (
    <div className="service-item p-8 bg-white rounded-lg border border-line hover-box-shadow">
      <Link className="service-item-main h-full" href={"/"}>
        <div className="heading flex items-center justify-between">
          {/* Render the Phosphor Icon component if it exists */}
          {IconComponent && (
            <div className="text-blue-600">
              {" "}
              {/* Can adjust this color class */}
              <IconComponent size={70} weight="duotone" />{" "}
              {/* Adjust size and weight as needed */}
            </div>
          )}
          {/* Fallback for old icomoon icons if needed, or remove if all icons are Phosphor */}
          {!IconComponent && data.icon.startsWith("icon-") && (
            <i className={`${data.icon} text-blue md:text-6xl text-5xl`}></i>
          )}
          <div className="number heading3 text-placehover text-slate-400">
            {number + 1}
          </div>
        </div>

        <div className="heading6 hover:text-blue duration-300 mt-6">
          {data.title}
        </div>
        <div className="text-secondary mt-2">{data.desc}</div>
      </Link>
    </div>
  );
};

export default ServiceItem;
