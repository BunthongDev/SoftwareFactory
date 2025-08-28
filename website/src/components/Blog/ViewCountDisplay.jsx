"use client";

import React from "react";
import { EyeIcon } from "@phosphor-icons/react";

// For display view count
const ViewCountDisplay = ({ viewCount }) => {
  return (
    <span className="flex items-center">
      <EyeIcon size={20} weight="bold" className="mr-1 text-gray-500" />
      {viewCount} reads
    </span>
  );
};

export default ViewCountDisplay;
