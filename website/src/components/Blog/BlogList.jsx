"use client";
import React, { useState, useMemo, useRef, useEffect } from "react";
import Image from "next/image";
import Link from "next/link";
import { motion } from "framer-motion";
import * as Icon from "@phosphor-icons/react/dist/ssr";

// Defines the `BlogCard` component, which is responsible for displaying a single blog post.
const BlogCard = ({ post }) => {
  const avatarSrc = post.avatar?.includes("/upload/")
    ? post.avatar
    : "/images/avatar-writer-image/crop-image-60x60.jpeg";

  // Starts the JSX return block for the `BlogCard`'s visual structure.
  return (
    <motion.div
      className="bg-white rounded-2xl shadow-lg overflow-hidden group grid sm:grid-cols-3"
      initial={{ opacity: 0, y: 20 }}
      whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: true }}
      transition={{ duration: 0.5 }}
    >
      <div className="relative h-48 sm:h-full sm:col-span-1">
        <Image
          src={post.img}
          alt={post.title}
          fill
          className="object-cover group-hover:scale-105 transition-transform duration-300 ease-in-out"
        />
      </div>
      <div className="p-6 sm:col-span-2 flex flex-col">
        <div className="mb-3">
          <span className="bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-full uppercase">
            {post.category}
          </span>
        </div>
        <h3 className="text-2xl font-bold text-black mb-3 group-hover:text-blue-600 transition-colors duration-300 font-battambang">
          <Link href={`/blog/${post.slug}`}>{post.title}</Link>
        </h3>
        <p className="text-gray-600 mb-4 flex-grow font-battambang line-clamp-3">
          {post.desc}
        </p>
        <div className="flex items-center text-sm text-gray-500 border-t border-gray-100 pt-4 mt-auto">
          <Image
            src={avatarSrc}
            alt={post.author}
            width={40}
            height={40}
            className="rounded-full mr-3 object-cover"
          />
          <span>
            By <strong className="text-gray-800">{post.author}</strong>
          </span>
          <span className="mx-2">•</span>
          <span>{post.date}</span>
        </div>
      </div>
    </motion.div>
  );
};

// Defines the main `BlogList` component, which handles the display and filtering of all blog posts.
const BlogList = ({ data }) => {
  const [searchTerm, setSearchTerm] = useState("");
  const [selectedCategory, setSelectedCategory] = useState("All");
  const mainContentRef = useRef(null);

  const categories = useMemo(() => {
    if (!data) return ["All"];
    return ["All", ...new Set(data.map((post) => post.category))];
  }, [data]);

  const filteredPosts = useMemo(() => {
    if (!data) return [];
    const term = searchTerm.toLowerCase();
    return data.filter(
      (post) =>
        (selectedCategory === "All" || post.category === selectedCategory) &&
        ((post.title || "").toLowerCase().includes(term) ||
          (post.desc || "").toLowerCase().includes(term))
    );
  }, [data, searchTerm, selectedCategory]);

  // A React hook that triggers a smooth scroll to the top of the article list whenever the filters change.
  useEffect(() => {
    if (mainContentRef.current) {
      mainContentRef.current.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    }
  }, [selectedCategory, searchTerm]);

  // Starts the JSX return block for the entire blog page layout, including the sidebar and the list of posts.
  return (
    <section className="bg-slate-50 py-24 sm:py-32">
      <div className="container mx-auto px-4">
        <div className="grid grid-cols-1 lg:grid-cols-4 gap-12">
          <aside className="lg:col-span-1">
            <div className="sticky top-24">
              <h3 className="text-2xl font-bold text-gray-900 mb-4">Search</h3>
              <div className="relative">
                <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                  <Icon.MagnifyingGlass size={20} className="text-gray-400" />
                </div>
                <input
                  type="text"
                  placeholder="Search articles..."
                  value={searchTerm}
                  onChange={(e) => setSearchTerm(e.target.value)}
                  className="block w-full rounded-lg border-gray-300 pl-10 pr-4 py-3 focus:border-blue-500 focus:ring-blue-500 font-battambang"
                />
              </div>
              <h3 className="text-2xl font-bold text-gray-900 mt-8 mb-4">
                Categories
              </h3>
              <div className="flex flex-col items-start gap-2">
                {categories.map((category) => (
                  <button
                    key={category}
                    onClick={() => setSelectedCategory(category)}
                    className={`px-4 py-2 text-left w-full font-semibold rounded-lg transition-colors duration-200 ${
                      selectedCategory === category
                        ? "bg-blue-600 text-white"
                        : "bg-white text-gray-700 hover:bg-gray-100"
                    }`}
                  >
                    {category}
                  </button>
                ))}
              </div>
            </div>
          </aside>

          <main className="lg:col-span-3" ref={mainContentRef}>
            {filteredPosts.length > 0 ? (
              <div className="space-y-8">
                {filteredPosts.map((post) => (
                  <BlogCard key={post.id} post={post} />
                ))}
              </div>
            ) : (
              <div className="text-center py-16 bg-white rounded-2xl">
                <h3 className="text-2xl font-semibold text-gray-800">
                  No articles found
                </h3>
                <p className="text-gray-500 mt-2">
                  Try adjusting your search or category filter.
                </p>
              </div>
            )}
          </main>
        </div>
      </div>
    </section>
  );
};

export default BlogList;