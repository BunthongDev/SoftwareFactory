"use client";
import Image from "next/image";
import Link from "next/link";
import { usePathname } from "next/navigation";
import React, { useState, useEffect } from "react";
import * as Icon from "@phosphor-icons/react/dist/ssr";

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

  return (
    <>
      <div
        className={`header-menu ${fixedHeader ? "fixed" : ""}`}
        style={{ backgroundColor: settings.background_color || "#FFFFFF" }}
      >
        <div className="container flex items-center justify-between h-20">
          <Link className="menu-left-block" href="/">

            <Image
              src={settings.logo_url || "/images/Software-Factory-Logo.png"}
              width={480}
              height={200}
              alt="logo"
              priority={true}
              className="w-[170px] h-auto max-sm:w-[132px]"
            />
          </Link>
          
          <div className="menu-center-block h-full">
            <ul className="menu-nav flex items-center xl:gap-2 h-full">
              {menu_items.map((item) => (
                <li
                  key={item.label}
                  className={`nav-item h-full flex items-center justify-center home ${
                    pathname === item.link ? "active" : ""
                  }`}
                >
                  <Link
                    className="nav-link text-title flex items-center gap-1"
                    href={item.link}
                  >
                    <span>{item.label}</span>
                  </Link>
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
                    className="nav-item-mobile h-full flex-column gap-2 pt-2 pl-3 pr-3 pb-2 pointer"
                  >
                    <Link
                      className="nav-link-mobile flex items-center justify-between"
                      href={item.link}
                      onClick={() => setOpenMenuMobile(false)}
                    >
                      <span className="font-bold">{item.label}</span>
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