// This file contains functions for fetching blog data.
export async function getBlogData() {
  // Construct the API URL using the environment variable.
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/blogs`;

  try {
    // Fetch the data, ensuring it's always the latest version.
    const res = await fetch(apiUrl, { cache: "no-store" });

    if (!res.ok) {
      console.error("Failed to fetch blog data:", res.statusText);
      return []; // Return an empty array on failure.
    }

    const jsonResponse = await res.json();
    return jsonResponse.data; // Return the actual data array.
  } catch (error) {
    console.error("Could not connect to the API to fetch blog data.", error);
    return []; // Return an empty array on connection error.
  }
}
