// This file only contains functions related to fetching CASE STUDIES.
export async function getCaseStudies(limit) {
  // Add the limit parameter
  // Use the environment variable to construct the API URL
  let apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/case-studies`;

  // If a limit is provided, add it to the URL
  if (limit) {
    apiUrl += `?limit=${limit}`;
  }

  try {
    const res = await fetch(apiUrl);

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
