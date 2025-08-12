import Footer from "@/components/Footer/Footer";
import Menu from "@/components/Header/Menu/Menu";
import TopNav from "@/components/Header/TopNav/TopNav";
import Partner from "@/components/Partner/Partner";
import React from "react";
import blogData from "@/data/blog.json";
import BlogList from "@/components/Blog/BlogList"; // Import the new BlogList component

// Import the data-fetching functions for the header
import { getTopNavData } from "@/lib/data/topnav";
import { getMenuData } from "@/lib/data/menu";

// Make the component async to allow for data fetching
const BlogPage = async () => {
  // Fetch the data for the TopNav and Menu components
  const liveTopNavData = await getTopNavData();
  const liveMenuData = await getMenuData();

  return (
    <div className="overflow-x-hidden">
      <header id="header">
        {/* Pass the fetched data as props */}
        <TopNav data={liveTopNavData} />
        <Menu data={liveMenuData} />
      </header>

      <main className="content">
        {/* Use the new BlogList component and pass the static blog data */}
        <BlogList data={blogData} />
      </main>

      <Partner className="lg:mt-[100px] sm:mt-16 mt-10" />
      <footer id="footer">
        <Footer />
      </footer>
    </div>
  );
};

export default BlogPage;
