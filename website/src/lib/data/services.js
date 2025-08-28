// This file only contains functions related to fetching SERVICES.
export async function getServices() {
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/services`;

  try {
    //  REMOVED { cache: "no-store" } to enable static generation
    const res = await fetch(apiUrl);

    if (!res.ok) {
      console.error("Failed to fetch services:", res.statusText);
      return [];
    }

    const jsonResponse = await res.json();
    return jsonResponse.data;
  } catch (error) {
    console.error("Could not connect to the API to fetch services.", error);
    return [];
  }
}
