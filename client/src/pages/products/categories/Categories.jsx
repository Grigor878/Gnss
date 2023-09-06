import React from "react";
import { productsSub } from "../../../view/data";
import { useNavigate } from "react-router-dom";
import "./Categories.scss";

const Categories = ({ title }) => {
  const navigate = useNavigate();

  return (
    <section>
      <div className="container">
        <h2>{title}</h2>

        {productsSub
          ?.filter((el) => el.parent === title)
          ?.map(({ id, title, path }) => {
            return (
              <div key={id} onClick={() => navigate(path)}>
                <p>{title}</p>
              </div>
            );
          })}
      </div>
    </section>
  );
};

export default Categories;
