// This file only contains functions related to fetching SLIDERS.
export async function getSliders() {
    // Use the environment variable to construct the API URL
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/sliders`;

  try {
    const res = await fetch(apiUrl, { cache: "no-store" });

    if (!res.ok) {
      console.error("Failed to fetch sliders:", res.statusText);
      return [];
    }

    const jsonResponse = await res.json();
    return jsonResponse.data;
  } catch (error) {
    console.error("Could not connect to the API to fetch sliders.", error);
    return [];
  }
}
