import { DivideIcon } from "@phosphor-icons/react";
import { headers } from "next/headers";
import Image from "next/image";
import TopNav from '../components/Header/TopNav/TopNav';
import Menu from "@/components/Header/Menu/Menu";
import Slider from "@/components/Slider/slider";
import Service from "@/components/Service/Service";
import serviceData from '@/data/service.json'
import CaseStudy from "@/components/CaseStudy/CaseStudy";
import Testimonial from "@/components/Testimonial/Testimonial";
import Blog from "@/components/Blog/Blog";
import BlogData from '@/data/blog.json';
import Footer from "@/components/Footer/Footer";
import Partner from "@/components/Partner/Partner";


export default function Home() {
  return (
    <div className="overflow-hidden">
      <header id="header">
        <TopNav />
        <Menu />
      </header>

      <main className="content">
        <Slider />
        <Service data={serviceData} />
        <CaseStudy />
        <Testimonial />
        <Blog data={BlogData} />
      </main>
      
        <Partner className="lg:mt-[100px] sm:mt-16 mt-10 "/>
        <Footer id="footer" >
          <Footer/>
        </Footer>
        
    </div>
  );
}
