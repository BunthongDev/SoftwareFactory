// This file contains functions for fetching blog data.

// Fetches a list of blogs, with an optional limit
export async function getBlogData(limit) {
  let apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/blogs`;
  if (limit) {
    apiUrl += `?limit=${limit}`;
  }

  try {
    // REMOVED { cache: "no-store" } to allow static generation
    const res = await fetch(apiUrl);

    if (!res.ok) {
      console.error("Failed to fetch blog data:", res.statusText);
      return [];
    }
    return (await res.json()).data;
  } catch (error) {
    console.error("Could not connect to the API to fetch blog data.", error);
    return [];
  }
}

// Fetches a single post by its slug
export async function getPostBySlug(slug) {
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/blogs/${slug}`;
  try {
    // REMOVED { cache: "no-store" }
    const res = await fetch(apiUrl);
    if (!res.ok) return null;
    return (await res.json()).data;
  } catch (error) {
    console.error("Failed to fetch post by slug:", error);
    return null;
  }
}

// Fetches related posts for a given post
export async function getRelatedPosts(postId, category) {
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/related-blogs?postId=${postId}&category=${category}`;
  try {
    // REMOVED { cache: "no-store" }
    const res = await fetch(apiUrl);
    if (!res.ok) return [];
    return (await res.json()).data;
  } catch (error) {
    console.error("Failed to fetch related posts:", error);
    return [];
  }
}
