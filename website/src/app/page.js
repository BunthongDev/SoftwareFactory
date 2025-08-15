// Component UI
import TopNav from "../components/Header/TopNav/TopNav";
import Menu from "@/components/Header/Menu/Menu";
import Slider from "@/components/Slider/slider";
import Service from "@/components/Service/Service";
import CaseStudy from "@/components/CaseStudy/CaseStudy";
import Testimonial from "@/components/Testimonial/Testimonial";
import OurClient from "@/components/OurClient/OurClient";
import Blog from "@/components/Blog/Blog";
import Footer from "@/components/Footer/Footer";
import Partner from "@/components/Partner/Partner";

// Import the data-fetching functions
import { getServices } from "@/lib/data/services";
import { getSliders } from "@/lib/data/sliders";
import { getCaseStudies } from "@/lib/data/casestudies";
import { getTopNavData } from "@/lib/data/topnav";
import { getMenuData } from "@/lib/data/menu";
import { getTestimonialData } from "@/lib/data/testimonials";
import { getClientData } from "@/lib/data/ourclients";
import { getLatestBlogData } from "@/lib/data/latest-blogs";
import { getFooterData } from "@/lib/data/footer"; 

export default async function Home() {
  // Fetch data for all components
  const [
    liveServiceData,
    liveSliderData,
    liveCaseStudyData,
    liveTopNavData,
    liveMenuData,
    liveTestimonialData,
    liveClientData,
    liveLatestBlogData,
    liveFooterData, 
  ] = await Promise.all([
    
    // Call new function
    getServices(),
    getSliders(),
    getCaseStudies(),
    getTopNavData(),
    getMenuData(),
    getTestimonialData(),
    getClientData(),
    getLatestBlogData(),
    getFooterData(), 
  ]);

  return (
    <div className="overflow-hidden">
      <header id="header">
        <TopNav data={liveTopNavData} />
        <Menu data={liveMenuData} />
      </header>

      <main className="content">
        <Slider data={liveSliderData} />
        <Service data={liveServiceData} />
        <CaseStudy data={liveCaseStudyData} />
        <Testimonial testimonialData={liveTestimonialData} />
        <OurClient clientData={liveClientData} />
        <Blog data={liveLatestBlogData} />
      </main>

      <Partner className="lg:mt-[100px] sm:mt-16 mt-10 " />
      <Footer data={liveFooterData} />
    </div>
  );
}
