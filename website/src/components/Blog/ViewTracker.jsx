"use client";

import { useEffect } from "react";

const ViewTracker = ({ postId, postSlug }) => {
  useEffect(() => {
    // We removed the localStorage check, so this will run on every page load.
    fetch(`${process.env.NEXT_PUBLIC_API_URL}/api/blogs/${postSlug}/view`, {
      method: "POST",
    })
    .catch((error) => {
      // Optional: Log an error if the API call fails
      console.error("Error tracking post view:", error);
    });
  }, [postId, postSlug]);

  return null; // This component does not render anything visible
};

export default ViewTracker;