import Partner from "@/components/Partner/Partner";
import BlogList from "@/components/Blog/BlogList";
import { getBlogData } from "@/lib/data/blogs";

export const metadata = {
  title: "Blog",
};

export default async function BlogPage() {
  const allBlogData = await getBlogData(); // Fetch all blog posts

  return (
    <>
      <main className="content">
        <BlogList data={allBlogData} />
      </main>
      <Partner className="lg:mt-[100px] sm:mt-16 mt-10" />
    </>
  );
}
