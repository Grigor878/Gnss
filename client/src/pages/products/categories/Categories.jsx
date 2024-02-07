import React, { useEffect } from "react";
// import { productsSub } from "../../../view/data";
import Skeleton from "../../../components/skeleton/Skeleton";
import { useDispatch, useSelector } from "react-redux";
import { getSubCategories } from "../../../store/slices/homeSlice";
import { Cards } from "../../../components/cards/Cards";
import { Title } from "../../../components/animate/Title";
import { APP_BASE_URL } from "../../../apis/config";
import "./Categories.scss";

const Categories = ({ id, title }) => {
  const { language, subCategories, bgImage } = useSelector((state => state.home))

  const dispatch = useDispatch();

  useEffect(() => {
    dispatch(getSubCategories({ id, language }))
  }, [dispatch, id, language])

  return (
    <section className="categories"
      style={{
        backgroundImage: `url(${APP_BASE_URL + bgImage})`,
        backgroundSize: "cover",
        backgroundBlendMode: "overlay",
        backgroundColor: "rgba(255, 255, 255, 0.5)"
      }}
    >
      <div className="container">
        <Title text={title} />

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
