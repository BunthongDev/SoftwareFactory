// This file contains the function for fetching all "Contact Us" page data.
export async function getContactUsData() {
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/contact-us`;

  try {
    // REMOVED { cache: "no-store" } to enable static site generation
    const res = await fetch(apiUrl);

    if (!res.ok) {
      console.error("Failed to fetch Contact Us data:", res.statusText);
      return { page_content: {}, contact_links: [] };
    }

    const jsonResponse = await res.json();
    // Safely access the data, which might be nested in a 'data' property
    return jsonResponse.data || jsonResponse;
  } catch (error) {
    console.error(
      "Could not connect to the API to fetch Contact Us data.",
      error
    );
    return { page_content: {}, contact_links: [] };
  }
}
