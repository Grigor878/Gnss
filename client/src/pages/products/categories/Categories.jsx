import React from "react";
import { productsSub } from "../../../view/data";
import Skeleton from "../../../components/skeleton/Skeleton";
import { FilteredCards } from "../../../components/cards/FilteredCards";
import "./Categories.scss";

const Categories = ({ title }) => {
  return (
    <section>
      <div className="container">
        <h2>{title}</h2>

        {!productsSub ? (
          <div className="skeleton__cards">
            <Skeleton type="cards" />
          </div>
        ) : (
          <FilteredCards data={productsSub} title={title} />
        )}
      </div>
    </section>
  );
};

export default Categories;
