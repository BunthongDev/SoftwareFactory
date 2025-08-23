import Footer from "@/components/Footer/Footer";
import Menu from "@/components/Header/Menu/Menu";
// import TopNav from "@/components/Header/TopNav/TopNav";
import Partner from "@/components/Partner/Partner";
import React from "react";
import * as Icon from "@phosphor-icons/react/dist/ssr";
import Link from "next/link";

// Import the data-fetching functions
// import { getTopNavData } from "@/lib/data/topnav";
import { getMenuData } from "@/lib/data/menu";
import { getFooterData } from "@/lib/data/footer";
import { getContactUsData } from "@/lib/data/contact-us"; // 1. Import the new function


//Metadata
export const metadata = {
  title: "Case Study",
};

// A reusable component for the contact link cards
const ContactLinkCard = ({ link }) => {
    // Dynamically select the correct icon based on the icon_class from the database
    const IconComponent = Icon[link.icon] || Icon.Link;

    return (
        <Link
            href={link.href || '#'}
            target="_blank"
            rel="noopener noreferrer"
            className={`bg-slate-50 p-8 rounded-2xl border text-center group ${link.hoverClass} hover:text-white transition-all duration-300 w-full sm:w-64 flex flex-col items-center justify-center h-48`}
        >
            <div className="flex justify-center text-blue-600 group-hover:text-white transition-colors duration-300 font-bold">
                <IconComponent size={42} />
            </div>
            <h3 className="mt-4 text-xl font-bold text-gray-900 group-hover:text-white transition-colors duration-300">
                {link.title}
            </h3>
            <p className="mt-1 text-gray-500 group-hover:text-blue-200 transition-colors duration-300 break-words">
                {link.detail}
            </p>
        </Link>
    );
};


const ContactUsPage = async () => {
  // 2. Fetch all the data for the page in parallel
  const [
    // liveTopNavData,
    liveMenuData, 
    liveFooterData, 
    contactUsData
  ] = await Promise.all([
    // getTopNavData(),
    getMenuData(),
    getFooterData(),
    getContactUsData(),
  ]);

  // Destructure the data for easier use
  const { page_content, contact_links } = contactUsData;

  // FIXED: Extract the src URL from the full iframe code
  const extractSrc = (iframeString) => {
    const match = iframeString?.match(/src="([^"]+)"/);
    return match ? match[1] : "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2112.0174581043384!2d104.81972392725844!3d11.587329398082742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31094f408204b59b%3A0x5ea3a0d5caab9667!2sBorey%20Golden%20Avenue%20by%20Mekong%20Land!5e1!3m2!1sen!2skh!4v1755598374798!5m2!1sen!2skh";
  };
  const mapUrl = extractSrc(page_content.map_url);


  return (
    <div className="overflow-x-hidden">
      <header id="header">
        {/* <TopNav data={liveTopNavData} /> */}
        <Menu data={liveMenuData} />
      </header>

      <main className="content">
        <section className="bg-white py-24 sm:py-32">
          <div className="container mx-auto px-4">
            <div className="text-center mb-16 max-w-3xl mx-auto">
              <h1 className="text-4xl md:text-5xl font-bold text-gray-900">
                {page_content.title}
              </h1>
              <p className="mt-4 text-lg text-gray-600">
                {page_content.description}
              </p>
            </div>

            {/* UPDATED: Changed from grid to a centered flex layout */}
            <div className="flex flex-wrap justify-center gap-8 max-w-7xl mx-auto mb-20">
              {contact_links.map((link) => (
                <ContactLinkCard key={link.id} link={link} />
              ))}
            </div>

            {/* Google Map Section (now dynamic) */}
            <div className="h-96 w-full rounded-2xl overflow-hidden">
              <iframe
                src={mapUrl}
                width="100%"
                height="100%"
                style={{ border: 0 }}
                allowFullScreen=""
                loading="lazy"
                referrerPolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
        </section>
      </main>

      <Partner className="lg:mt-[100px] sm:mt-16 mt-10" />
      <footer id="footer">
        <Footer data={liveFooterData} />
      </footer>
    </div>
  );
};

export default ContactUsPage;
