// This file only contains functions related to fetching SLIDERS.
export async function getSliders() {
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/sliders`;

  try {
    //  REMOVED { cache: "no-store" } to enable static generation
    const res = await fetch(apiUrl);

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