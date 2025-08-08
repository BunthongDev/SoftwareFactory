import TopNav from "../components/Header/TopNav/TopNav";
import Menu from "@/components/Header/Menu/Menu";
import Slider from "@/components/Slider/slider";
import Service from "@/components/Service/Service";
import CaseStudy from "@/components/CaseStudy/CaseStudy";
import Testimonial from "@/components/Testimonial/Testimonial";
import Blog from "@/components/Blog/Blog";
import BlogData from "@/data/blog.json";
import Footer from "@/components/Footer/Footer";
import Partner from "@/components/Partner/Partner";

// Import the data-fetching functions 
import { getServices } from "@/lib/data/services";
import { getSliders } from "@/lib/data/sliders";
import { getCaseStudies } from "@/lib/data/casestudies";
import { getTopNavData } from "@/lib/data/topnav";


export default async function Home() {
  // This part of the code doesn't need to change at all!
  const [liveServiceData, liveSliderData, liveCaseStudyData, liveTopNavData] = await Promise.all([
    getServices(),
    getSliders(),
    getCaseStudies(),
    getTopNavData(),
  ]);

  return (
    <div className="overflow-hidden">
      <header id="header">
        <TopNav data={liveTopNavData}/>
        <Menu />
      </header>

      <main className="content">
        <Slider data={liveSliderData} />
        <Service data={liveServiceData} />
        <CaseStudy data={liveCaseStudyData}/>
        <Testimonial/>
        <Blog data={BlogData} />
      </main>

      <Partner className="lg:mt-[100px] sm:mt-16 mt-10 " />
      <Footer id="footer" />
    </div>
  );
}
