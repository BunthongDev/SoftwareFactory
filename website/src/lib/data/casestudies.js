// This file only contains functions related to fetching CASE STUDIES.
export async function getCaseStudies() {
  // Use the environment variable to construct the API URL
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/case-studies`;

  try {
    const res = await fetch(apiUrl, { cache: "no-store" });

    if (!res.ok) {
      console.error("Failed to fetch case studies:", res.statusText);
      return [];
    }

    const jsonResponse = await res.json();
    return jsonResponse.data;
  } catch (error) {
    console.error("Could not connect to the API to fetch case studies.", error);
    return [];
  }
}
