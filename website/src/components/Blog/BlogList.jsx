"use client";
import React, { useState, useMemo } from "react";
import Image from "next/image";
import Link from "next/link";
import { motion } from "framer-motion";
import * as Icon from "@phosphor-icons/react/dist/ssr";

// A single blog card component, redesigned for a horizontal list layout.
const BlogCard = ({ post }) => {
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
          layout="fill"
          objectFit="cover"
          className="group-hover:scale-105 transition-transform duration-300 ease-in-out"
        />
      </div>
      <div className="p-6 sm:col-span-2 flex flex-col">
        <div className="mb-3">
          <span className="bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-full uppercase">
            {post.category}
          </span>
        </div>
        <h3 className="text-2xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-300">
          <Link href={`/blog/${post.id}`}>{post.title}</Link>
        </h3>
        <p className="text-gray-600 mb-4 flex-grow">{post.desc}</p>
        <div className="flex items-center text-sm text-gray-500 border-t border-gray-100 pt-4 mt-auto">
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
    </motion.div>
  );
};

// The main component that displays the list of blog posts
const BlogList = ({ data }) => {
  const [searchTerm, setSearchTerm] = useState("");
  const [selectedCategory, setSelectedCategory] = useState("All");

  // Get all unique categories from the blog data
  const categories = useMemo(() => {
    const allCategories = data.map((post) => post.category);
    return ["All", ...new Set(allCategories)];
  }, [data]);

  // Filter posts based on search term and selected category
  const filteredPosts = useMemo(() => {
    return data.filter((post) => {
      const matchesCategory =
        selectedCategory === "All" || post.category === selectedCategory;
      const matchesSearch =
        post.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
        post.desc.toLowerCase().includes(searchTerm.toLowerCase());
      return matchesCategory && matchesSearch;
    });
  }, [data, searchTerm, selectedCategory]);

  return (
    <section className="bg-slate-50 py-24 sm:py-32">
      <div className="container mx-auto px-4">
        <div className="grid grid-cols-1 lg:grid-cols-4 gap-12">
          {/* Left Column: Filters and Search */}
          <aside className="lg:col-span-1">
            <div className="sticky top-24">
              <h3 className="text-2xl font-bold text-gray-900 mb-4">Search</h3>
              <div className="relative">
                <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                  <Icon.MagnifyingGlassIcon size={20} className="text-gray-400" />
                </div>
                <input
                  type="text"
                  placeholder="Search articles..."
                  value={searchTerm}
                  onChange={(e) => setSearchTerm(e.target.value)}
                  className="block w-full rounded-lg border-gray-300 pl-10 pr-4 py-3 focus:border-blue-500 focus:ring-blue-500"
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

          {/* Right Column: Blog Post List */}
          <main className="lg:col-span-3">
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
