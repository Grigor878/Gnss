import React, { useState } from "react";
// import { useTranslation } from "react-i18next";
import ImageGallery from "react-image-gallery";
import "react-image-gallery/styles/css/image-gallery.css";
import "./FullScreenSlide.scss";

export const FullScreenSlide = ({ startIndex, images, onClose }) => {
  const [currentIndex, setCurrentIndex] = useState(startIndex);

//   const { t } = useTranslation();

  return (
    <div className="fullscreen-slider">
      <ImageGallery
        items={images}
        startIndex={currentIndex}
        showPlayButton={false}
        showFullscreenButton={false}
        onSlide={(index) => setCurrentIndex(index)}
      />
      <button
        className="close-button"
        type="button"
        onClick={onClose}
        // text={t("btn_close")}
      >Close</button>
    </div>
  );
};
