// This file contains the function for fetching all "Contact Us" page data.
export async function getContactUsData() {
  // Construct the API URL using the environment variable.
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/contact-us`;

  try {
    // Fetch the data, ensuring it's always the latest version.
    const res = await fetch(apiUrl, { cache: "no-store" });

    if (!res.ok) {
      console.error("Failed to fetch Contact Us data:", res.statusText);
      // Return a default structure on failure so the page doesn't crash
      return { page_content: {}, contact_links: [] };
    }

    const jsonResponse = await res.json();
    return jsonResponse; // Return the full data object
  } catch (error) {
    console.error(
      "Could not connect to the API to fetch Contact Us data.",
      error
    );
    return { page_content: {}, contact_links: [] };
  }
}
