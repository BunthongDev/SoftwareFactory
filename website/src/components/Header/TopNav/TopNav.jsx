import React from "react";
import * as Icon from '@phosphor-icons/react/dist/ssr';
import Link from "next/link";

const TopNav = () => {
  return (
    <>
      <div className="bg-slate-600">
        <div className="container flex items-center justify-between h-[44px]">
          <div className="left-block flex items-center">
            <div className="location flex items-center ml-10">
              <Icon.MapPinIcon className="text-white text-xl max-lg:hidden" />
              <span className="ml-2 caption1 text-white max-lg:hidden text-[12px]">
                Street 2011, #290 Borey MekongLand Golden Avenue, Phnom Penh |
                Cambodia{" "}
              </span>
              <div className="mail lg:ml-7 flex items-center">
                <Icon.EnvelopeIcon className="text-white text-xl" />
                <span className="ml-2 caption1 text-white">
                  support@softwarefactory.com{" "}
                </span>
              </div>
            </div>
          </div>

          <div className="right-block flex items-center">
            <div className="line h-6 w-px bg-gray max-sm:hidden"></div>
            <div className="list-social flex items-center gap-4 max-sm:hidden ">
              <Link
                className="item rounded-full w-7 h-7 border-2 flex items-center justify-center hover:bg-gray-300"
                href="https://www.facebook.com/poipetinsider"
                target="_blank"
              >
                <Icon.FacebookLogoIcon className="text-blue-300 text-xl" />
              </Link>

              <Link
                className="item rounded-full w-7 h-7 border-2 flex items-center justify-center hover:bg-gray-300"
                href="https://www.facebook.com/poipetinsider"
                target="_blank"
              >
                <Icon.LinkedinLogoIcon className="text-blue-300 text-xl" />
              </Link>

              <Link
                className="item rounded-full w-7 h-7 border-gray border-2 flex items-center justify-center hover:bg-gray-300"
                href="https://www.facebook.com/poipetinsider"
                target="_blank"
              >
                <Icon.TwitterLogoIcon className="text-blue-300 text-xl" />
              </Link>
              <Link
                className="item rounded-full w-7 h-7 border-gray border-2 flex items-center justify-center hover:bg-gray-300"
                href="https://www.facebook.com/poipetinsider"
                target="_blank"
              >
                <Icon.InstagramLogoIcon className="text-blue-300 text-xl" />
              </Link>

              <Link
                className="item rounded-full w-7 h-7 border-gray border-2 flex items-center justify-center hover:bg-gray-300"
                href="https://www.youtube.com/@PoipetInsider"
                target="_blank"
              >
                <Icon.YoutubeLogoIcon className="text-blue-300 text-xl" />
              </Link>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default TopNav;
