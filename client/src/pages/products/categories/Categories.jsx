import React, { useEffect } from "react";
// import { productsSub } from "../../../view/data";
import Skeleton from "../../../components/skeleton/Skeleton";
import { useDispatch, useSelector } from "react-redux";
import { getSubCategories } from "../../../store/slices/homeSlice";
import { Cards } from "../../../components/cards/Cards";
import { Title } from "../../../components/animate/Title";
import "./Categories.scss";

const Categories = ({ id, title }) => {
  const { language, subCategories } = useSelector((state => state.home))
  // console.log(subCategories);//
  const dispatch = useDispatch();

  useEffect(() => {
    dispatch(getSubCategories({ id, language }))
  }, [dispatch, id, language])

  return (
    <section className="categories">
      <div className="container">
        <Title text={title}/>

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
