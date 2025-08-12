// This file only contains the function for fetching testimonial data.
export async function getTestimonialData() {
  // Construct the API URL using the environment variable.
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/testimonials`;

  try {
    // Fetch the data, ensuring it's always the latest version.
    const res = await fetch(apiUrl, { cache: "no-store" });

    if (!res.ok) {
      console.error("Failed to fetch testimonial data:", res.statusText);
      return []; // Return an empty array on failure.
    }

    const jsonResponse = await res.json();

    // CORRECTED: We know the data is inside the 'data' property.
    return jsonResponse.data;
  } catch (error) {
    console.error(
      "A connection error occurred while fetching testimonials:",
      error
    );
    return []; // Return an empty array on connection error.
  }
}
