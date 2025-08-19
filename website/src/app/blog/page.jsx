import Footer from "@/components/Footer/Footer";
import Menu from "@/components/Header/Menu/Menu";
import TopNav from "@/components/Header/TopNav/TopNav";
import Partner from "@/components/Partner/Partner";
import React from "react";
import BlogList from "@/components/Blog/BlogList"; // Import the new BlogList component

// Import the data-fetching functions
import { getTopNavData } from "@/lib/data/topnav";
import { getMenuData } from "@/lib/data/menu";
import { getBlogData } from "@/lib/data/blogs"; // 1. Import the new blog data function
import { getFooterData } from "@/lib/data/footer";


// Meta Data
export const metadata = {
  title: "Blog",
};

// Make the component async to allow for data fetching
const BlogPage = async () => {
  // Fetch the data for the components
  const liveTopNavData = await getTopNavData();
  const liveMenuData = await getMenuData();
  const liveBlogData = await getBlogData(); // 2. Fetch the live blog data
  const liveFooterData = await getFooterData();
  
  return (
    <div className="overflow-x-hidden">
      <header id="header">
        {/* Pass the fetched data as props */}
        <TopNav data={liveTopNavData} />
        <Menu data={liveMenuData} />
      </header>

      <main className="content">
        {/* 3. Pass the live blog data to the BlogList component */}
        <BlogList data={liveBlogData} />
      </main>

      <Partner className="lg:mt-[100px] sm:mt-16 mt-10" />
      <footer id="footer">
        <Footer data={liveFooterData} />
      </footer>
    </div>
  );
};

export default BlogPage;
