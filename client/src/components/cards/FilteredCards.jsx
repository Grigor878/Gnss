import React, { useRef } from "react";
import { AiOutlineArrowLeft, AiOutlineArrowRight } from "react-icons/ai";
import { useLocation, useNavigate } from "react-router-dom";
import "./styles.scss";

export const FilteredCards = ({ data, title }) => {
  const navigate = useNavigate();

  const scrollableDivRef = useRef(null);
  const scroll = 277;

  const scrollLeft = () => {
    const scrollableDiv = scrollableDivRef.current;
    if (scrollableDiv) {
      scrollableDiv.scrollLeft -= scroll;
    }
  };

  const scrollRight = () => {
    const scrollableDiv = scrollableDivRef.current;
    if (scrollableDiv) {
      scrollableDiv.scrollLeft += scroll;
    }
  };

  return (
    <div className="scrollable">
      <AiOutlineArrowLeft className="scrollLeft" onClick={scrollLeft} />
      <div className="cards" ref={scrollableDivRef}>
        {data
          ?.filter((el) => el.parent === title)
          ?.map(({ id, path, image, title }) => {
            return (
              <div
                key={id}
                onClick={() => navigate(path)}
                className="cards__block"
              >
                <img src={image} alt="img" />
                <h3>{title}</h3>
                <span>See More</span>
              </div>
            );
          })}
      </div>
      <AiOutlineArrowRight className="scrollRight" onClick={scrollRight} />
    </div>
  );
};
