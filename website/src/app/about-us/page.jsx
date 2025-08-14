import Footer from "@/components/Footer/Footer";
import Menu from "@/components/Header/Menu/Menu";
import TopNav from "@/components/Header/TopNav/TopNav";
import Partner from "@/components/Partner/Partner";
import React from "react";
import Image from "next/image";
import * as Icon from "@phosphor-icons/react/dist/ssr";

// Import the data-fetching functions for the header
import { getTopNavData } from "@/lib/data/topnav";
import { getMenuData } from "@/lib/data/menu";

// Mock data for team members - now with social links
const teamMembers = [
  {
    id: 1,
    name: "John Doe",
    role: "Co-Founder & CEO",
    avatar: "/images/member/328x350.png",
    socials: {
      linkedin: "#",
      twitter: "#",
      facebook: "#",
    },
  },
  {
    id: 2,
    name: "Jane Smith",
    role: "Co-Founder & CTO",
    avatar: "/images/member/484x512.png",
    socials: {
      linkedin: "#",
      twitter: "#",
      facebook: "#",
    },
  },
  {
    id: 3,
    name: "Peter Jones",
    role: "Lead Designer",
    avatar: "/images/member/328x350.png",
    socials: {
      linkedin: "#",
      twitter: "#",
      facebook: "#",
    },
  },
];

// Mock data for the company timeline - UNCHANGED
const timelineEvents = [
  {
    year: "2020",
    event: "Company Founded",
    description:
      "Our journey began with a small team and a big idea to revolutionize the industry.",
  },
  {
    year: "2022",
    event: "First Major Product Launch",
    description:
      "We launched our flagship product, receiving critical acclaim and a strong user base.",
  },
  {
    year: "2024",
    event: "Expanded to International Markets",
    description:
      "Our services went global, reaching new customers and partners across the world.",
  },
  {
    year: "Present",
    event: "Continuing to Innovate",
    description:
      "We remain committed to pushing boundaries and delivering excellence.",
  },
];

const AboutUsPage = async () => {
  // Fetch the data for the TopNav and Menu components
  const liveTopNavData = await getTopNavData();
  const liveMenuData = await getMenuData();

  return (
    <div className="overflow-x-hidden">
      <header id="header">
        <TopNav data={liveTopNavData} />
        <Menu data={liveMenuData} />
      </header>

      <main className="content">
        {/* --- UPDATED Hero Section --- */}
        <section className="bg-white">
          <div className="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-24 sm:py-32">
            {/* Left Column: Text Content */}
            <div className="text-center lg:text-left">
              <h1 className="text-6xl font-bold tracking-tight text-gray-900">
                About Anajak Software
              </h1>
              <p className="mt-6 text-lg sm:text-xl max-w-2xl mx-auto lg:mx-0 text-gray-600">
                We are a passionate team of developers, designers, and
                strategists dedicated to building exceptional digital products
                that drive growth and innovation for our clients.
              </p>
              <div className="mt-10 flex flex-col sm:flex-row gap-16 justify-center lg:justify-start">
                <div>
                  <div className="text-8xl font-bold text-blue-600">150+</div>
                  <div className="text-gray-500 mt-1 text-lg">
                    Projects Completed
                  </div>
                </div>
                <div>
                  <div className="text-8xl font-bold text-blue-600">99%</div>
                  <div className="text-gray-500 mt-1 text-lg">Happy Client</div>
                </div>
              </div>
            </div>
            {/* Right Column: Image Collage */}
            <div className="relative h-96 lg:h-[500px] w-full order-first lg:order-last">
              <div className="absolute top-0 left-0 w-2/3 h-2/3 rounded-2xl overflow-hidden shadow-2xl">
                <Image
                  src="/images/gateway1.webp"
                  alt="Team working"
                  fill
                  className="object-cover"
                />
              </div>
              <div className="absolute bottom-0 right-0 w-1/2 h-1/2 rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
                <Image
                  src="/images/ads.webp"
                  alt="Office environment"
                  fill
                  className="object-cover"
                />
              </div>
            </div>
          </div>
        </section>

        {/* --- UNCHANGED Our Story / Timeline Section --- */}
        <section className="py-24 sm:py-32 bg-slate-50">
          <div className="container mx-auto px-4">
            <div className="text-center mb-16">
              <h2 className="text-6xl font-bold text-gray-900">Our Journey</h2>
              <p className="mt-4 text-lg text-gray-600">
                A brief history of our milestones and achievements.
              </p>
            </div>
            <div className="relative max-w-4xl mx-auto">
              <div className="absolute left-1/2 w-0.5 h-full bg-gray-200 -translate-x-1/2"></div>
              {timelineEvents.map((item, index) => (
                <div key={index} className="relative flex items-center mb-12">
                  <div
                    className={`w-1/2 ${
                      index % 2 === 0
                        ? "pr-8 text-right"
                        : "pl-8 text-left ml-auto"
                    }`}
                  >
                    <div className="p-6 bg-white rounded-lg shadow-lg border border-gray-100">
                      <h3 className="text-xl font-bold text-blue-600">
                        {item.event}
                      </h3>
                      <p className="text-gray-600 mt-2 text-pretty">
                        {item.description}
                      </p>
                    </div>
                  </div>
                  <div className="absolute left-1/2 -translate-x-1/2 w-20 h-20 bg-blue-600 ring-4 ring-blue-200 rounded-full flex items-center justify-center text-white font-bold shadow-2xl">
                    {item.year}
                  </div>
                </div>
              ))}
            </div>
          </div>
        </section>

        {/* --- UNCHANGED Team Section --- */}
        <section className="bg-white py-24 sm:py-32">
          <div className="container mx-auto px-4">
            <div className="text-center mb-16">
              <h2 className="text-6xl font-bold text-gray-900">
                Meet Our Team
              </h2>
              <p className="mt-4 text-lg text-gray-600">
                The talented individuals behind our success.
              </p>
            </div>
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">
              {teamMembers.map((member) => (
                <div key={member.id} className="text-center group">
                  <div className="relative h-80 w-full mx-auto mb-4 rounded-2xl overflow-hidden">
                    <Image
                      src={member.avatar}
                      alt={member.name}
                      fill
                      className="object-cover group-hover:scale-110 transition-transform duration-300"
                    />
                    <div className="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center gap-4 opacity-0 group-hover:opacity-100">
                      <a
                        href={member.socials.linkedin}
                        className="text-white hover:text-blue-400"
                      >
                        <Icon.FacebookLogoIcon size={32} />
                      </a>

                      <a
                        href={member.socials.linkedin}
                        className="text-white hover:text-blue-400"
                      >
                        <Icon.LinkedinLogoIcon size={32} />
                      </a>
                      <a
                        href={member.socials.twitter}
                        className="text-white hover:text-blue-400"
                      >
                        <Icon.TwitterLogoIcon size={32} />
                      </a>
                    </div>
                  </div>
                  <h3 className="text-xl font-bold text-gray-900">
                    {member.name}
                  </h3>
                  <p className="text-blue-600 font-semibold">{member.role}</p>
                </div>
              ))}
            </div>
          </div>
        </section>
      </main>

      <Partner className="lg:mt-[100px] sm:mt-16 mt-10" />
      <footer id="footer">
        <Footer />
      </footer>
    </div>
  );
};

export default AboutUsPage;
