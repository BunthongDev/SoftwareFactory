// This function fetches all active ads from your Laravel API
export async function getAdsData() {
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/ads`;
  try {
    const res = await fetch(apiUrl);
    if (!res.ok) return {}; // Return empty object on error
    const jsonResponse = await res.json();
    return jsonResponse;
  } catch (error) {
    console.error("Failed to fetch ads data:", error);
    return {}; // Return empty object on error
  }
}