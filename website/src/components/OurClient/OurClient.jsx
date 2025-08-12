"use client";
import React from "react";
import Image from "next/image";

// Using paths to your local images in the public folder.
const clients = [
  { id: 1, name: "Client One", logoUrl: "/images/partner/1.svg" },
  { id: 2, name: "Client Two", logoUrl: "/images/partner/2.svg" },
  { id: 3, name: "Client Three", logoUrl: "/images/partner/3.svg" },
  { id: 4, name: "Client Four", logoUrl: "/images/partner/4.svg" },
  { id: 5, name: "Client Five", logoUrl: "/images/partner/5.svg" },
  { id: 6, name: "Client Six", logoUrl: "/images/partner/6.svg" },
  { id: 7, name: "Client Seven", logoUrl: "/images/partner/7.svg" },
  { id: 8, name: "Client Eight", logoUrl: "/images/partner/8.svg" },
];

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
        // UPDATED: Added a container div for the white box effect.
        <div
          key={`${client.id}-${index}`}
          className="flex-shrink-0 w-64 mx-4 py-4"
        >
          <div className="bg-white rounded-2xl shadow-md h-32 flex items-center justify-center p-6">
            <Image
              src={client.logoUrl}
              alt={`${client.name} logo`}
              width={158}
              height={48}
              className="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out"
            />
          </div>
        </div>
      ))}
    </div>
  );
};

const OurClient = () => {
  // Split the clients into two arrays for the two rows.
  const halfwayIndex = Math.ceil(clients.length / 2);
  const row1 = clients.slice(0, halfwayIndex);
  const row2 = clients.slice(halfwayIndex);

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
          animation: scroll-x 40s linear infinite;
        }
        .group:hover .animate-scroll-x {
          animation-play-state: paused;
        }
      `}</style>
      <section className="bg-slate-100 py-24 sm:py-32">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <h2 className="text-6xl font-bold tracking-tight text-gray-900 sm:text-6xl">
              Our's Client 🏅
            </h2>
          </div>
          {/* We now have two rows scrolling in opposite directions */}
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
