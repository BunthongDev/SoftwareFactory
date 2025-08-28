"use client";
import React from "react"; // 1. Removed useEffect and useState
import Image from "next/image";

const ClientRow = ({ clients, reverse = false }) => {
  const duplicatedClients = [...clients, ...clients];

  return (
    <div
      className="flex w-max animate-scroll-x"
      style={{
        animationDirection: reverse ? "reverse" : "normal",
      }}
    >
      {duplicatedClients.map((client, index) => (
        <a
          key={`${client.id}-${index}`}
          href={client.website_url || "#"}
          target="_blank"
          rel="noopener noreferrer"
          className="flex-shrink-0 w-48 sm:w-56 mx-4 py-2"
        >
          <div className="bg-white rounded-2xl shadow-md h-28 flex items-center justify-center p-4">
            <Image
              src={client.logo || "/images/AnajakSoftware-page-not-found.png"}
              alt={`${client.name || "client"} logo`}
              width={158}
              height={48}
              className="h-[70px] w-auto object-contain transition-all duration-300 ease-in-out"
            />
          </div>
        </a>
      ))}
    </div>
  );
};

// 2. Receive 'data' as a prop
export default function OurClient({ data: clientData }) {
  // 3. REMOVED the useState, useEffect for data fetching, and loading state.

  if (!clientData || clientData.length === 0) {
    return null; // Don't render if there's no client data
  }

  // Logic to split clients into two rows remains the same
  const halfwayIndex = Math.ceil(clientData.length / 2);
  const row1 = clientData.slice(0, halfwayIndex);
  const row2 = clientData.slice(halfwayIndex);

  return (
    <>
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

      <section id="ourclient" className="bg-slate-100 py-24 sm:py-32">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <h2 className="text-6xl sm:text-6xl font-bold tracking-tight text-gray-900">
              Our Clients 🏅
            </h2>
          </div>
          <div className="relative group w-full flex flex-col gap-6">
            <ClientRow clients={row1} />
            <ClientRow clients={row2} reverse={true} />
          </div>
        </div>
      </section>
    </>
  );
}
