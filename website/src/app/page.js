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

export default async function Home() {
  // This part of the code doesn't need to change at all!
  const [liveServiceData, liveSliderData] = await Promise.all([
    getServices(),
    getSliders(),
  ]);

  return (
    <div className="overflow-hidden">
      <header id="header">
        <TopNav />
        <Menu />
      </header>

      <main className="content">
        <Slider data={liveSliderData} />
        <Service data={liveServiceData} />
        <CaseStudy />
        <Testimonial />
        <Blog data={BlogData} />
      </main>

      <Partner className="lg:mt-[100px] sm:mt-16 mt-10 " />
      <Footer id="footer" />
    </div>
  );
}
