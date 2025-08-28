import React from "react";
import Partner from "@/components/Partner/Partner";
import ContactLinkCard from "@/components/ContactUs/ContactLinkCard";
import { getContactUsData } from "@/lib/data/contact-us";

export const metadata = { title: "Contact Us" };

export default async function ContactUsPage() {
  const { page_content = {}, contact_links = [] } = await getContactUsData();

  // Extract only the src URL if an iframe string is returned
  const extractSrc = (iframeString) => {
    const match = iframeString?.match(/src="([^"]+)"/);
    return (
      match?.[1] ||
      "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2112.0174581043384!2d104.81972392725844!3d11.587329398082742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31094f408204b59b%3A0x5ea3a0d5caab9667!2sBorey%20Golden%20Avenue%20by%20Mekong%20Land!5e1!3m2!1sen!2skh!4v1755598374798!5m2!1sen!2skh"
    );
  };
  const mapUrl = extractSrc(page_content?.map_url);

  return (
    <div className="overflow-x-hidden">
      <main className="content">
        <section className="bg-white py-24 sm:py-32">
          <div className="container mx-auto px-4">
            <div className="text-center mb-16 max-w-3xl mx-auto">
              <h1 className="text-4xl md:text-5xl font-bold text-gray-900">
                {page_content?.title || "Contact Us"}
              </h1>
              <p className="mt-4 text-lg text-gray-600">
                {page_content?.description || "Get in touch with our team."}
              </p>
            </div>

            <div className="flex flex-wrap justify-center gap-8 max-w-7xl mx-auto mb-20">
              {contact_links.map((link) => (
                <ContactLinkCard key={link.id ?? link.title} link={link} />
              ))}
            </div>

            <div className="h-96 w-full rounded-2xl overflow-hidden">
              <iframe
                src={mapUrl}
                width="100%"
                height="100%"
                style={{ border: 0 }}
                allowFullScreen=""
                loading="lazy"
                referrerPolicy="no-referrer-when-downgrade"
              />
            </div>
          </div>
        </section>
      </main>

      <Partner className="lg:mt-[100px] sm:mt-16 mt-10" />
    </div>
  );
}