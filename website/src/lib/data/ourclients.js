// This file only contains the function for fetching client data.
export async function getClientData() {
  // Construct the API URL using the environment variable.
  const apiUrl = `${process.env.NEXT_PUBLIC_API_URL}/api/clients`;

  try {
    // Fetch the data, ensuring it's always the latest version.
    const res = await fetch(apiUrl);

    if (!res.ok) {
      console.error("Failed to fetch client data:", res.statusText);
      return []; // Return an empty array on failure.
    }

    const jsonResponse = await res.json();
    return jsonResponse.data; // Return the actual data array.
  } catch (error) {
    console.error("Could not connect to the API to fetch client data.", error);
    return []; // Return an empty array on connection error.
  }
}
