// This file only contains functions related to fetching SERVICES.
export async function getServices() {
    // Use the environment variable to construct the API URL
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/services`;

  try {
    const res = await fetch(apiUrl, { cache: "no-store" });

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
