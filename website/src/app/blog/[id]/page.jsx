import Footer from "@/components/Footer/Footer";
import Menu from "@/components/Header/Menu/Menu";
import TopNav from "@/components/Header/TopNav/TopNav";
import Partner from "@/components/Partner/Partner";
import React from "react";
import blogData from "@/data/blog.json";
import Image from "next/image";
import { notFound } from "next/navigation";
import Link from "next/link";

// Import the data-fetching functions for the header
import { getTopNavData } from "@/lib/data/topnav";
import { getMenuData } from "@/lib/data/menu";

// This function finds a specific blog post by its ID
const getPostById = (id) => {
  // Note: The id from the URL is a string, so we convert it to a number
  return blogData.find((post) => post.id === parseInt(id));
};

// This function finds other posts in the same category
const getRelatedPosts = (currentPost) => {
  return blogData
    .filter(
      (post) =>
        post.category === currentPost.category && post.id !== currentPost.id
    )
    .slice(0, 3); // Get up to 3 related posts
};

// A new component for the related post cards
const RelatedPostCard = ({ post }) => {
  return (
    <div className="bg-gray-50 rounded-2xl overflow-hidden group">
      <div className="relative h-48">
        <Image
          src={post.img}
          alt={post.title}
          layout="fill"
          objectFit="cover"
          className="group-hover:scale-105 transition-transform duration-300"
        />
      </div>
      <div className="p-6">
        <h3 className="font-bold text-lg text-gray-900 group-hover:text-blue-600 transition-colors">
          <Link href={`/blog/${post.id}`}>{post.title}</Link>
        </h3>
        <p className="text-sm text-gray-500 mt-2">{post.date}</p>
      </div>
    </div>
  );
};

// This is the main page component for a single blog post
const BlogPostPage = async ({ params }) => {
  // Fetch the data for the TopNav and Menu components
  const liveTopNavData = await getTopNavData();
  const liveMenuData = await getMenuData();

  // Get the specific post using the id from the URL params
  const post = getPostById(params.id);

  // If no post is found for the given ID, show a 404 page
  if (!post) {
    notFound();
  }

  // Get the related posts
  const relatedPosts = getRelatedPosts(post);

  return (
    <div className="overflow-x-hidden">
      <header id="header">
        <TopNav data={liveTopNavData} />
        <Menu data={liveMenuData} />
      </header>

      <main className="content bg-white py-24 sm:py-32">
        <div className="container mx-auto px-4">
          <div className="max-w-3xl mx-auto">
            {/* Post Header */}
            <div className="text-center mb-12">
              <span className="bg-blue-500 text-white text-sm font-semibold px-4 py-2 rounded-full uppercase mb-4 inline-block">
                {post.category}
              </span>
              <h1 className="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                {post.title}
              </h1>
              <div className="flex items-center justify-center text-md text-gray-500">
                <Image
                  src={post.avatar}
                  alt={post.author}
                  width={40}
                  height={40}
                  className="rounded-full mr-3"
                />
                <span>
                  By <strong className="text-gray-800">{post.author}</strong>
                </span>
                <span className="mx-2">•</span>
                <span>{post.date}</span>
              </div>
            </div>

            {/* Main Post Image */}
            <div className="relative h-96 rounded-2xl overflow-hidden mb-12">
              <Image
                src={post.img}
                alt={post.title}
                layout="fill"
                objectFit="cover"
              />
            </div>

            {/* Post Content */}
            <div className="prose prose-lg max-w-none text-gray-700">
              <p>{post.desc}</p>
              {/* You can add more content here. For example, if your blog data
                  had a 'content' field with Markdown, you could render it here. */}
            </div>
          </div>
        </div>
      </main>

      {/* Related Articles Section */}
      {relatedPosts.length > 0 && (
        <section className="bg-slate-50 py-24 sm:py-32">
          <div className="container mx-auto px-4">
            <div className="max-w-3xl mx-auto text-center mb-12">
              <h2 className="text-3xl font-bold text-gray-900">
                Related Articles
              </h2>
            </div>
            <div className="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
              {relatedPosts.map((relatedPost) => (
                <RelatedPostCard key={relatedPost.id} post={relatedPost} />
              ))}
            </div>
          </div>
        </section>
      )}

      <Partner className="lg:mt-[100px] sm:mt-16 mt-10" />
      <footer id="footer">
        <Footer />
      </footer>
    </div>
  );
};

export default BlogPostPage;
