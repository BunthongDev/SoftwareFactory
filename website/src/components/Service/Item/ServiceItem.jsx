import Link from "next/link";
import React from "react";


const ServiceItem = ({ data, number }) => {
  

  return (
    <div className="service-item p-8 bg-white rounded-lg border border-line hover-box-shadow">
      <div className="service-item-main h-full">
        <div className="heading flex items-center justify-between">
          {/* NEW: Render the icon using an <i> tag and the class name from the database */}
          {data.icon && (
            <div className="text-blue-600">
              <i className={`${data.icon} text-6xl`}></i>
            </div>
          )}

          <div className="number heading3 text-placehover text-slate-400">
            {/* A small improvement to add a leading zero */}
            {number + 1 < 10 ? `0${number + 1}` : number + 1}
          </div>
        </div>

        <div className="heading6 hover:text-blue duration-300 mt-6">
          {data.title}
        </div>
        {/* Remember to use data.description to match Laravel backend API */}
        <div className="text-secondary mt-2">{data.description}</div>
      </div>
    </div>
  );
};

export default ServiceItem;
