// This file contains the function for fetching all "About Us" page data.
export async function getAboutUsData() {
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/about-us`;

  try {
    // REMOVED { cache: "no-store" } to enable static site generation (SSG)
    const res = await fetch(apiUrl);

    if (!res.ok) {
      console.error("Failed to fetch About Us data:", res.statusText);
      return { page_content: {}, team_members: [], timeline_events: [] };
    }

    const jsonResponse = await res.json();
    // The API response might have the data nested, so let's safely access it.
    return jsonResponse.data || jsonResponse;
  } catch (error) {
    console.error(
      "Could not connect to the API to fetch About Us data.",
      error
    );
    return { page_content: {}, team_members: [], timeline_events: [] };
  }
}
