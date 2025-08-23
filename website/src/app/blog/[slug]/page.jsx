import Footer from "@/components/Footer/Footer";
import Menu from "@/components/Header/Menu/Menu";
// import TopNav from "@/components/Header/TopNav/TopNav";
import Partner from "@/components/Partner/Partner";
import React from "react";
import Image from "next/image";
import { notFound } from "next/navigation";
import Link from "next/link";

// --- START: NEW IMPORTS FOR ADS ---
import AdBanner from "@/components/Ads/AdBanner";
import PopupAd from "@/components/Ads/PopupAd";
import { getAdsData } from "@/lib/data/ads";
// --- END: NEW IMPORTS FOR ADS ---

// Import the data-fetching functions for the header
// import { getTopNavData } from "@/lib/data/topnav";
import { getMenuData } from "@/lib/data/menu";
import { getFooterData } from "@/lib/data/footer";
import StickyFooterAd from "@/components/Ads/StickyFooterAd";

// Meta Data
export const metadata = {
  title: "Read article",
};

// --- FUNCTIONS TO FETCH LIVE DATA ---
async function getPostBySlug(slug) {
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/blogs/${slug}`;
  try {
    const res = await fetch(apiUrl, { cache: "no-store" });
    if (!res.ok) return null;
    const jsonResponse = await res.json();
    return jsonResponse.data;
  } catch (error) {
    console.error("Failed to fetch post by slug:", error);
    return null;
  }
}

async function getRelatedPosts(postId, category) {
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/related-blogs?postId=${postId}&category=${category}`;
  try {
    const res = await fetch(apiUrl, { cache: "no-store" });
    if (!res.ok) return [];
    const jsonResponse = await res.json();
    return jsonResponse.data;
  } catch (error) {
    console.error("Failed to fetch related posts:", error);
    return [];
  }
}

// --- COMPONENT TO HANDLE IN-CONTENT ADS ---
const PostContent = ({ htmlContent, ads }) => {
  if (!ads || ads.length === 0) {
    return (
      <div
        className="prose prose-lg max-w-none text-black font-battambang"
        dangerouslySetInnerHTML={{ __html: htmlContent }}
      />
    );
  }

  const contentParts = htmlContent.split("</p>");
  const adPlacementIndex = 2;

  return (
    <div className="prose prose-lg max-w-none text-black font-battambang">
      {contentParts.map((part, index) => (
        <React.Fragment key={index}>
          <div
            dangerouslySetInnerHTML={{
              __html: part + (index < contentParts.length - 1 ? "</p>" : ""),
            }}
          />
          {index === adPlacementIndex - 1 && (
            <div className="my-8">
              <AdBanner ads={ads} />
            </div>
          )}
        </React.Fragment>
      ))}
    </div>
  );
};

const RelatedPostCard = ({ post }) => {
  return (
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
        <h3 className="font-bold text-lg text-black group-hover:text-blue-600 transition-colors">
          <Link href={`/blog/${post.slug}`}>{post.title}</Link>
        </h3>
        <p className="text-sm text-gray-500 mt-2">{post.date}</p>
      </div>
    </div>
  );
};


const BlogPostPage = async (props) => {
  const params = await props.params; 
  const slug = params.slug;

  const post = await getPostBySlug(slug);

  if (!post) {
    notFound();
  }

  const [
    // liveTopNavData,
    liveMenuData,
    relatedPosts,
    liveFooterData,
    liveAdsData,
  ] = await Promise.all([
    // getTopNavData(),
    getMenuData(),
    getRelatedPosts(post.id, post.category),
    getFooterData(),
    getAdsData(),
  ]);

  const avatarSrc =
    post.avatar && post.avatar.includes("/upload/")
      ? post.avatar
      : "/images/avatar-writer-image/crop-image-60x60.jpeg";

  return (
    <div className="overflow-x-hidden">
      <header id="header">
        {/* <TopNav data={liveTopNavData} /> */}
        <Menu data={liveMenuData} />
      </header>

      <main className="content bg-white py-24 sm:py-32">
        <div className="container mx-auto px-4">
          <div className="max-w-3xl mx-auto">
            {/* Post Header */}
            <div className="text-center mb-12">
              <span className="bg-blue-500 text-white text-sm font-semibold px-4 py-2 rounded-full uppercase mb-4 inline-block font-battambang">
                {post.category}
              </span>
              <h1 className="text-2xl md:text-3xl font-bold text-black mb-4 font-battambang leading-8 sm:text-2xl sm:leading-8 md:leading-10">
                {post.title}
              </h1>
              <div className="flex items-center justify-center text-md text-gray-500">
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

            {/* --- AD PLACEMENT 1: BELOW TITLE --- */}
            <div className="my-8">
              <AdBanner ads={liveAdsData.below_title} />
            </div>

            {/* Main Post Image */}
            <div className="relative h-96 rounded-2xl overflow-hidden mb-12">
              <Image
                src={post.img}
                alt={post.title}
                fill
                className="object-cover"
              />
            </div>

            {/* --- AD PLACEMENT 2: IN CONTENT --- */}
            <PostContent
              htmlContent={post.content}
              ads={liveAdsData.in_content}
            />

            {/* --- AD PLACEMENT 4: END OF ARTICLE --- */}
            <div className="my-12 border-t pt-8">
              <AdBanner ads={liveAdsData.end_of_article} />
            </div>
          </div>
        </div>
      </main>

      {/* Related Articles Section */}
      {relatedPosts.length > 0 && (
        <section className="bg-slate-50 py-24 sm:py-32">
          <div className="container mx-auto px-4">
            <div className="max-w-3xl mx-auto text-center mb-12">
              <h2 className="text-5xl font-bold text-black">
                Related Articles 📖
              </h2>
            </div>
            <div className="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 font-battambang">
              {relatedPosts.map((relatedPost) => (
                <RelatedPostCard key={relatedPost.id} post={relatedPost} />
              ))}
            </div>
          </div>
        </section>
      )}

      <Partner className="lg:mt-[100px] sm:mt-16 mt-10" />
      <footer id="footer">
        <Footer data={liveFooterData} />
      </footer>

      {/* --- AD PLACEMENT 3: STICKY FOOTER --- */}
      <StickyFooterAd ads={liveAdsData.sticky_footer} />

      {/* --- AD PLACEMENT 5: POPUP --- */}
      <PopupAd ads={liveAdsData.popup} />
    </div>
  );
};

export default BlogPostPage;
