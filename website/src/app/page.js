// Imports all the visual section components that will be displayed on the homepage.
import Slider from "@/components/Slider/slider";
import Service from "@/components/Service/Service";
import Testimonial from "@/components/Testimonial/Testimonial";
import CaseStudy from "@/components/CaseStudy/CaseStudy";
import OurClient from "@/components/OurClient/OurClient";
import Partner from "@/components/Partner/Partner";
import Blog from "@/components/Blog/Blog";

// Imports the server-side functions used to fetch data from the API.
import { getCaseStudies } from "@/lib/data/casestudies";
import { getBlogData } from "@/lib/data/blogs";
import { getSliders } from "@/lib/data/sliders";
import { getServices } from "@/lib/data/services";
import { getTestimonialData } from "@/lib/data/testimonials";
import { getClientData } from "@/lib/data/ourclients";

// Defines the homepage as an asynchronous Server Component, allowing it to fetch data on the server before rendering.
export default async function Home() {

  // Fetches all necessary data for the homepage sections in parallel for maximum performance.
  const [
    sliderData,
    latestStudies,
    latestPosts,
    servicesData,
    testimonialData,
    clientData,
  ] = await Promise.all([ // This array contains all the data-fetching function calls that will be executed at the same time.
    getSliders(),
    getCaseStudies(7),
    getBlogData(3),
    getServices(),
    getTestimonialData(),
    getClientData(),
  ]);

  // Starts the JSX return block, which defines the structure of the homepage.
  return (
    <div className="overflow-hidden">
      <main className="content">
        {/* Renders each section component in order, passing the fetched data to them as props. */}
        <Slider data={sliderData} />
        <Service initialServices={servicesData} />
        <Testimonial data={testimonialData} />
        <CaseStudy data={latestStudies} />
        <OurClient data={clientData} />
        <Blog data={latestPosts} />
        <Partner />
      </main>
    </div>
  );
}