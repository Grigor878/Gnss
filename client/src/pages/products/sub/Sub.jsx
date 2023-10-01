import React, { useEffect } from "react";
import Skeleton from "../../../components/skeleton/Skeleton";
import { useDispatch, useSelector } from "react-redux";
import { getChildSubCategories } from "../../../store/slices/homeSlice";
import { Cards } from "../../../components/cards/Cards";
import { Title } from "../../../components/animate/Title";
import "./Sub.scss";

const Sub = ({ id, parent, title }) => {
  const combinedText = `${parent} - ${title}`;

  const { language, childSubcategories } = useSelector((state => state.home))
  const dispatch = useDispatch();
  // console.log(childSubcategories);//
  useEffect(() => {
    dispatch(getChildSubCategories({ id, language }))
  }, [dispatch, id, language])

  return (
    <section className="sub">
      <div className="container">
        <Title text={combinedText} />

        {!childSubcategories?.length ? (
          <div className="skeleton__cards">
            <Skeleton type="cards" />
          </div>
        ) : (
          <Cards data={childSubcategories} title={title} />
        )}
      </div>
    </section>
  );
};

export default Sub;
