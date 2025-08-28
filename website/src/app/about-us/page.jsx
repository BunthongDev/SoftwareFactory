import AboutUsContent from "@/components/AboutUs/AboutUsContent";
import { getAboutUsData } from "@/lib/data/about-us.js"; // 1. Import the data function

export const metadata = { title: "About Us" };

// 2. Make the page an async Server Component
export default async function AboutUsPage() {
  // 3. Fetch the data on the server before the page loads
  const aboutUsData = await getAboutUsData();

  // 4. Pass the fetched data as a prop to the content component
  return <AboutUsContent data={aboutUsData} />;
}
