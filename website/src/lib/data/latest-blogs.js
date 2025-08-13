// This file contains the function for fetching the latest blog posts.
export async function getLatestBlogData() {
  // Construct the API URL using the environment variable.
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/latest-blogs`;

  try {
    // Fetch the data, ensuring it's always the latest version.
    const res = await fetch(apiUrl, { cache: "no-store" });

    if (!res.ok) {
      console.error("Failed to fetch latest blog data:", res.statusText);
      return []; // Return an empty array on failure.
    }

    const jsonResponse = await res.json();
    return jsonResponse.data; // Return the actual data array.
  } catch (error) {
    console.error(
      "Could not connect to the API to fetch latest blog data.",
      error
    );
    return []; // Return an empty array on connection error.
  }
}
