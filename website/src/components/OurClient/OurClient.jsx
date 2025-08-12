"use client";
import React from "react";
import Image from "next/image";

// A component for a single scrolling row of logos.
const ClientRow = ({ clients, reverse = false }) => {
  // We duplicate the logos to create a seamless, infinite scroll effect.
  const duplicatedClients = [...clients, ...clients];

  return (
    <div
      className="flex w-max animate-scroll-x"
      style={{
        animationDirection: reverse ? "reverse" : "normal",
      }}
    >
      {duplicatedClients.map((client, index) => (
        // Each client is now a clickable link
        <a
          key={`${client.id}-${index}`}
          href={client.website_url || "#"} // Use the website_url from the API
          target="_blank"
          rel="noopener noreferrer"
          className="flex-shrink-0 w-64 mx-4 py-4"
        >
          <div className="bg-white rounded-2xl shadow-md h-32 flex items-center justify-center p-6">
            <Image
              src={client.logo} // Use the 'logo' property from the API
              alt={`${client.name} logo`}
              width={158}
              height={48}
              className="hover:grayscale-0 transition-all duration-300 ease-in-out"
            />
          </div>
        </a>
      ))}
    </div>
  );
};

// The main component now accepts `clientData` as a prop
const OurClient = ({ clientData }) => {
  // If no data is passed, show a loading/empty state
  if (!clientData || clientData.length === 0) {
    return (
      <section className="bg-slate-100 py-24 sm:py-32 text-center">
        <p>Loading clients or no data available.</p>
      </section>
    );
  }

  // Split the clients into two arrays for the two rows.
  const halfwayIndex = Math.ceil(clientData.length / 2);
  const row1 = clientData.slice(0, halfwayIndex);
  const row2 = clientData.slice(halfwayIndex);

  return (
    <>
      {/* We need to add the keyframe animations to the global scope. */}
      <style jsx global>{`
        @keyframes scroll-x {
          from {
            transform: translateX(0);
          }
          to {
            transform: translateX(-50%);
          }
        }
        .animate-scroll-x {
          animation: scroll-x 30s linear infinite;
        }
        .group:hover .animate-scroll-x {
          animation-play-state: paused;
        }
      `}</style>
      <section className="bg-slate-100 py-24 sm:py-32">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <h2 className="text-6xl font-bold tracking-tight text-gray-900 sm:text-6xl">
              Our Clients 🏅
            </h2>
          </div>
          <div className="relative group w-full flex flex-col gap-8 overflow-hidden">
            <ClientRow clients={row1} />
            <ClientRow clients={row2} reverse={true} />
          </div>
        </div>
      </section>
    </>
  );
};

export default OurClient;
