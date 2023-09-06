import React from "react";
import { useNavigate } from "react-router-dom";
import "./Cards.scss";

export const Cards = ({ data }) => {
  const navigate = useNavigate();

  return (
    <div className="cards">
      {data?.map(({ id, path, image, title }) => {
        return (
          <div key={id} onClick={() => navigate(path)} className="cards__block">
            <img src={image} alt="img" />
            <h3>{title}</h3>
            <span>See More</span>
          </div>
        );
      })}
    </div>
  );
};
