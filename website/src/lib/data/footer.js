// This file contains the function for fetching all footer data.
export async function getFooterData() {
  // Construct the API URL using the environment variable.
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/footer`;

  try {
    // Fetch the data, ensuring it's always the latest version.
    const res = await fetch(apiUrl);

    if (!res.ok) {
      console.error("Failed to fetch footer data:", res.statusText);
      // Return a default structure on failure so the page doesn't crash
      return null;
    }

    const jsonResponse = await res.json();
    return jsonResponse; // Return the full data object
  } catch (error) {
    console.error("Could not connect to the API to fetch footer data.", error);
    return null;
  }
}
