import Image from "next/image";
import Link from "next/link";

// This is a new sub-component for rendering a single ad
const SingleAd = ({ ad }) => {
  if (!ad || !ad.image_url) {
    return null;
  }

  // Ads size
  const adContent = (
    <div className="relative w-full h-auto">
      <Image
        src={ad.image_url}
        alt={ad.title || "Advertisement"}
        width={1200}
        height={400}
        className="object-contain w-full h-auto rounded-lg"
        sizes="(max-width: 768px) 100vw, 80vw"
      />
    </div>
  );

  if (ad.link_url) {
    return (
      <Link href={ad.link_url} target="_blank" rel="noopener noreferrer" className="block w-full h-auto">
        {adContent}
      </Link>
    );
  }

  return adContent;
};


// The main AdBanner component now handles a list of ads
const AdBanner = ({ ads }) => {
  // If no ads are provided, don't render anything
  if (!ads || ads.length === 0) {
    return null;
  }

  return (
    // This container will stack the ads vertically with a small gap
    <div className="flex flex-col gap-y-1">
      {ads.map((ad) => (
        <SingleAd key={ad.id} ad={ad} />
      ))}
    </div>
  );
};

export default AdBanner;
