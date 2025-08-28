// This file contains the function for fetching global site settings.
export async function getSettingData() {
  // Construct the API URL using the environment variable.
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/settings`;

  try {
    // Fetch the data, ensuring it's always the latest version.
    const res = await fetch(apiUrl);

    if (!res.ok) {
      console.error("Failed to fetch site settings:", res.statusText);
      // Return a default structure on failure so the page doesn't crash
      return null;
    }

    const jsonResponse = await res.json();
    return jsonResponse; // Return the full data object
  } catch (error) {
    console.error(
      "Could not connect to the API to fetch site settings.",
      error
    );
    return null;
  }
}
