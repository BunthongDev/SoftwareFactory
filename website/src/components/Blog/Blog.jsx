"use client";
import React from "react";
import Image from "next/image";
import Link from "next/link";
import { motion } from "framer-motion";

// A single blog card component for the homepage
const BlogCard = ({ post }) => {
  const avatarSrc =
    post.avatar && post.avatar.includes("/upload/")
      ? post.avatar
      : "/images/avatar-writer-image/crop-image-60x60.jpeg";

  // Starts the JSX return block, defining the visual layout of a single blog card.
  return (
    <motion.div
      className="bg-white rounded-2xl shadow-lg overflow-hidden group"
      initial={{ opacity: 0, y: 20 }}
      whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: true }}
      transition={{ duration: 0.5 }}
    >
      <div className="relative h-56">
        <Image
          src={post.img}
          alt={post.title}
          fill
          className="object-cover group-hover:scale-105 transition-transform duration-300 ease-in-out"
        />
      </div>
      <div className="p-6 flex flex-col flex-grow">
        <h3 className="md:text-sm sm:text-xl text-sm font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300 h-20 font-battambang">
          {/* FIXED: The link now correctly uses post.slug */}
          <Link href={`/blog/${post.slug}`}>{post.title}</Link>
        </h3>
        <div className="flex items-center text-sm text-gray-500 border-t border-gray-100 pt-4 mt-auto">
          <Image
            src={avatarSrc}
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

// The main component for the homepage blog section
const Blog = ({ data }) => {
  // If no data is passed, don't render the section
  if (!data || data.length === 0) {
    return null;
  }

  // Starts the JSX return block, defining the layout for the entire 'Latest News' section.
  return (
    <section className="bg-slate-50 py-24 sm:py-32">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <h2 className="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
            Latest News 📰
          </h2>
          <p className="mt-4 text-lg leading-8 text-gray-600">
            Check out our latest articles and insights.
          </p>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {data.map((post) => (
            <BlogCard key={post.id} post={post} />
          ))}
        </div>
      </div>
    </section>
  );
};

export default Blog;