import { DivideIcon } from "@phosphor-icons/react";
import { headers } from "next/headers";
import Image from "next/image";
import TopNav from '../components/Header/TopNav/TopNav';
import Menu from "@/components/Header/Menu/Menu";
import Slider from "@/components/Slider/slider";
import Service from "@/components/Service/Service";
import serviceData from '@/data/service.json'


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
      </main>
    </div>
  );
}
