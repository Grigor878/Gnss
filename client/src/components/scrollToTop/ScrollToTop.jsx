import React, { useState, useEffect } from "react";
import { BsFillArrowUpCircleFill } from "react-icons/bs";
import "./ScrollToTop.scss";

const ScrollToTop = () => {
  const [isVisible, setIsVisible] = useState(false);
  const [scrollToFooter, setScrollToFooter] = useState(0);

  useEffect(() => {
    const handleScroll = () => {
      const scrollY = window.scrollY;
      if (scrollY > 200) {
        setIsVisible(true);
      } else {
        return setIsVisible(false);
      }

      const windowHeight = window.innerHeight;
      const totalScrollHeight = document.documentElement.scrollHeight;
      const distanceToFooter = totalScrollHeight - (scrollY + windowHeight);
      setScrollToFooter(distanceToFooter);
    };

    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const handleScrollToTop = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  };

  return (
    <BsFillArrowUpCircleFill
      style={{ color: scrollToFooter <= 500 ? "#ffffff" : "#E22403" }}
      className={`${isVisible ? "scrollTop-visible" : "scrollTop"}`}
      onClick={handleScrollToTop}
    />
  );
};

export default ScrollToTop;
