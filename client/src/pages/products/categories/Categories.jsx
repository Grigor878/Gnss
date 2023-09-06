import React, { useEffect } from "react";
import { productsSub } from "../../../view/data";
import Skeleton from "../../../components/skeleton/Skeleton";
import { useDispatch, useSelector } from "react-redux";
import { getSubCategories } from "../../../store/slices/homeSlice";
import { Cards } from "../../../components/cards/Cards";
import "./Categories.scss";

const Categories = ({ id, title }) => {
  const { language, subCategories } = useSelector((state => state.home))

  // console.log(subCategories);

  const dispatch = useDispatch();

  useEffect(() => {
    dispatch(getSubCategories({ id, language }))
  }, [dispatch, id, language])

  return (
    <section className="categories">
      <div className="container">
        <h2>{title}</h2>

        {!subCategories?.length ? (
          <div className="skeleton__cards">
            <Skeleton type="cards" />
          </div>
        ) : (
          <Cards data={subCategories} title={title} />
        )}
      </div>
    </section>
  );
};

export default Categories;
