import React from "react";
import Image from "next/image";
import { notFound } from "next/navigation";
import Link from "next/link";
import Partner from "@/components/Partner/Partner";
import AdBanner from "@/components/Ads/AdBanner";
import PopupAd from "@/components/Ads/PopupAd";
import StickyFooterAd from "@/components/Ads/StickyFooterAd";
import ViewTracker from "@/components/Blog/ViewTracker";
import ViewCountDisplay from "@/components/Blog/ViewCountDisplay";

// --- START: Refactored Data Fetching Imports ---
import { getAdsData } from "@/lib/data/ads";
import { getBlogData, getPostBySlug, getRelatedPosts } from "@/lib/data/blogs"; // Centralized imports
// --- END: Refactored Data Fetching Imports ---

// generateStaticParams tells Next.js which blog pages to build statically
export async function generateStaticParams() {
  const posts = await getBlogData(); // Use our static-friendly function
  return posts.map((post) => ({
    slug: post.slug,
  }));
}

export async function generateMetadata({ params }) {
  const { slug } = await params;
  const post = await getPostBySlug(slug);
  if (!post) return { title: "Post Not Found" };
  return { title: post.title, description: post.excerpt };
}

// Component for rendering post content with ads
const PostContent = ({ htmlContent, ads }) => {
  if (!ads || ads.length === 0) {
    return (
      <div
        className="prose prose-lg max-w-none"
        dangerouslySetInnerHTML={{ __html: htmlContent }}
      />
    );
  }
  const contentParts = htmlContent.split("</p>");
  return (
    <div className="prose prose-lg max-w-none">
      {contentParts.map((part, index) => (
        <React.Fragment key={index}>
          <div
            dangerouslySetInnerHTML={{
              __html: part + (index < contentParts.length - 1 ? "</p>" : ""),
            }}
          />
          {index === 1 && (
            <div className="my-8">
              <AdBanner ads={ads} />
            </div>
          )}
        </React.Fragment>
      ))}
    </div>
  );
};

// Card for related posts
const RelatedPostCard = ({ post }) => (
  <div className="bg-gray-50 rounded-2xl overflow-hidden group">
    <div className="relative h-48">
      <Image
        src={post.img}
        alt={post.title}
        fill
        className="object-cover group-hover:scale-105 transition-transform duration-300"
      />
    </div>
    <div className="p-6">
      <h3 className="font-bold text-lg group-hover:text-blue-600 transition-colors font-battambang">
        <Link href={`/blog/${post.slug}`}>{post.title}</Link>
      </h3>
      <p className="text-sm text-gray-500 mt-2">{post.date}</p>
    </div>
  </div>
);

// The main page component
export default async function BlogPostPage({ params }) {
  const { slug } = await params;
  const post = await getPostBySlug(slug);

  if (!post) {
    notFound();
  }

  // Fetch related data in parallel for performance
  const [relatedPosts, liveAdsData] = await Promise.all([
    getRelatedPosts(post.id, post.category),
    getAdsData(),
  ]);

  const avatarSrc = post.avatar?.includes("/upload/")
    ? post.avatar
    : "/images/avatar-writer-image/crop-image-60x60.jpeg";

  return (
    <>
      <ViewTracker postId={post.id} postSlug={post.slug} />
      <main className="content bg-white py-24 sm:py-32">
        <div className="container mx-auto px-4">
          <div className="max-w-3xl mx-auto">
            <div className="text-center mb-12">
              <span className="bg-blue-500 text-white text-sm font-semibold px-4 py-2 rounded-full uppercase mb-4 inline-block">
                {post.category}
              </span>
              <h1 className="text-4xl md:text-5xl font-bold text-black mb-4 leading-tight font-battambang">
                {post.title}
              </h1>
              <div className="flex items-center justify-center text-md text-gray-500 flex-wrap">
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
                <span className="mx-2">•</span>
                <ViewCountDisplay viewCount={post.formatted_view_count} />
              </div>
            </div>
            <div className="my-8">
              <AdBanner ads={liveAdsData.below_title} />
            </div>
            <div className="relative h-96 rounded-2xl overflow-hidden mb-12">
              <Image
                src={post.img}
                alt={post.title}
                fill
                className="object-cover"
              />
            </div>
            <PostContent
              htmlContent={post.content}
              ads={liveAdsData.in_content}
            />
            <div className="my-12 border-t pt-8">
              <AdBanner ads={liveAdsData.end_of_article} />
            </div>
          </div>
        </div>
      </main>

      {relatedPosts.length > 0 && (
        <section className="bg-slate-50 py-24 sm:py-32">
          <div className="container mx-auto px-4">
            <div className="max-w-3xl mx-auto text-center mb-12">
              <h2 className="text-5xl font-bold text-black">
                Related Articles 📖
              </h2>
            </div>
            <div className="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
              {relatedPosts.map((p) => (
                <RelatedPostCard key={p.id} post={p} />
              ))}
            </div>
          </div>
        </section>
      )}

      <Partner className="lg:mt-[100px] sm:mt-16 mt-10" />
      <StickyFooterAd ads={liveAdsData.sticky_footer} />
      <PopupAd ads={liveAdsData.popup} />
    </>
  );
}
