import React, { useRef } from "react";
import { useNavigate } from "react-router-dom";
import { useDispatch } from "react-redux";
import { AiOutlineArrowLeft, AiOutlineArrowRight } from "react-icons/ai";
import { clearSubCategories } from "../../store/slices/homeSlice";
import "./Cards.scss";
import { capitalizeText } from "../../helpers/formatters";

export const Cards = ({ data }) => {
  const navigate = useNavigate();
  const dispatch = useDispatch();

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

  const handleNavigate = (path) => {
    dispatch(clearSubCategories())
    navigate(path)
  }

  return (
    <div className="scrollable">
      {data?.length > 4 && (
        <AiOutlineArrowLeft className="scrollLeft" onClick={scrollLeft} />
      )}
      <div className="cards" ref={scrollableDivRef}>
        {data?.map(({ id, path, image, title }) => {
          return (
            <div key={id} onClick={() => handleNavigate(path)} className="cards__block">
              <img src={`http://gnss.admin.loc/storage/` + image} alt="img" />
              <h3>{capitalizeText(title)}</h3>
              <span>See More</span>
            </div>
          );
        })}
      </div>
      {data?.length > 4 && (
        <AiOutlineArrowRight className="scrollRight" onClick={scrollRight} />
      )}
    </div>
  );
};
