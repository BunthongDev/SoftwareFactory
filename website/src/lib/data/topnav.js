// This file only contains functions related to fetching TOP NAVBAR DATA.
export async function getTopNavData() {
  // Use the environment variable to construct the API URL
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/top-navbar-settings`;

  try {
    const res = await fetch(apiUrl);

    if (!res.ok) {
      console.error("Failed to fetch top navbar data:", res.statusText);
      return [];
    }

    const jsonResponse = await res.json();
    return jsonResponse.data;
  } catch (error) {
    console.error("Could not connect to the API to fetch top navbar data.", error);
    return [];
  }
}
