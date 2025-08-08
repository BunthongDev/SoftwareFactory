// This file only contains functions related to fetching TOP menu DATA.
export async function getMenuData() {
  // Use the environment variable to construct the API URL
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/menu-data`;

  try {
    const res = await fetch(apiUrl, { cache: "no-store" });

    if (!res.ok) {
      console.error("Failed to fetch menu data:", res.statusText);
      return [];
    }

    const jsonResponse = await res.json();
    return jsonResponse.data;
  } catch (error) {
    console.error(
      "Could not connect to the API to fetch menu data.",
      error
    );
    return [];
  }
}
