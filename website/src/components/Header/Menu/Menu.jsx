"use client";
import Image from "next/image";
import Link from "next/link";
import { usePathname } from "next/navigation";
import React, { useState, useEffect } from "react";
import * as Icon from "@phosphor-icons/react/dist/ssr";
import { motion } from "framer-motion";

const Menu = ({ data }) => {
  const pathname = usePathname();
  const [fixedHeader, setFixedHeader] = useState(false);
  const [openMenuMobile, setOpenMenuMobile] = useState(false);

  const { settings = {}, menu_items = [] } = data || {};

  useEffect(() => {
    const handleScroll = () => setFixedHeader(window.scrollY > 100);
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  // Helper function to check for the active link
  const isActive = (link) => {
    if (link === "/") {
      return pathname === "/";
    }
    return pathname.startsWith(link);
  };

  return (
    <>
      <div
        className={`header-menu ${fixedHeader ? "fixed" : ""}`}
        style={{ backgroundColor: settings.background_color || "#FFFFFF" }}
      >
        <div className="container flex items-center justify-between h-20">
          <Link className="menu-left-block" href="/">
            <Image
              src={
                settings.logo_url || "/AnajakSoftware-page-not-found.png"
              }
              width={480}
              height={200}
              alt="logo"
              priority={true}
              className="w-[175px] h-auto max-sm:w-[132px]"
            />
          </Link>

          <div className="menu-center-block h-full">
            <ul className="menu-nav flex items-center gap-1 h-full">
              {menu_items.map((item) => (
                <li
                  key={item.label}
                  className="nav-item h-full flex flex-col items-center justify-center relative"
                >
                  <Link
                    className={`nav-link text-title flex items-center gap-1 px-1 py-2 transition-colors duration-200 font-bold ${
                      isActive(item.link)
                        ? "text-blue-600 font-bold"
                        : "text-gray-700 hover:text-blue-600"
                    }`}
                    href={item.link}
                  >
                    <span>{item.label}</span>
                  </Link>
                  {/* The animated dot indicator */}
                  {isActive(item.link) && (
                    <motion.div
                      className="absolute bottom-4 h-1.5 w-1.5 bg-blue-600 rounded-full"
                      layoutId="active-dot"
                    />
                  )}
                </li>
              ))}
            </ul>
          </div>

          <div className="menu-right-block flex items-center">
            <div className="icon-call">
              <i className="icon-phone-call text-4xl"></i>
            </div>
            <div className="text ml-3">
              <div className="text caption1">{settings.consultancy_text}</div>
              <div className="number text-button">{settings.phone_number}</div>
            </div>
            <div
              className="menu-humburger hidden pointer"
              onClick={() => setOpenMenuMobile(!openMenuMobile)}
            >
              <Icon.ListIcon className="text-2xl" weight="bold" />
            </div>
          </div>
        </div>

        <div id="menu-mobile-block" className={` ${openMenuMobile && "open"}`}>
          <div className="menu-mobile-main">
            <div className="container">
              <ul className="menu-nav-mobile h-full pt-1 pb-1">
                {menu_items.map((item) => (
                  <li
                    key={item.label}
                    className={`nav-item-mobile h-full flex-column gap-2 pt-2 pl-3 pr-3 pb-2 pointer rounded-lg ${
                      isActive(item.link) ? "bg-blue-100" : ""
                    }`}
                  >
                    <Link
                      className="nav-link-mobile flex items-center justify-between"
                      href={item.link}
                      onClick={() => setOpenMenuMobile(false)}
                    >
                      <span
                        className={`font-bold ${
                          isActive(item.link) ? "text-blue-600" : ""
                        }`}
                      >
                        {item.label}
                      </span>
                    </Link>
                  </li>
                ))}
              </ul>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default Menu;
