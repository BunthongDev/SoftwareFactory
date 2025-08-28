// This file only contains functions related to fetching TOP menu DATA.
export async function getMenuData() {
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/menu-data`;

  try {
    // REMOVED { cache: "no-store" } to enable static site generation
    const res = await fetch(apiUrl);

    if (!res.ok) {
      console.error("Failed to fetch menu data:", res.statusText);
      return {}; // Return an empty object on failure
    }

    const jsonResponse = await res.json();
    return jsonResponse.data || {}; // Safely access the data
  } catch (error) {
    console.error("Could not connect to the API to fetch menu data.", error);
    return {};
  }
}
