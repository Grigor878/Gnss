import React, { useEffect } from "react";
import Skeleton from "../../../components/skeleton/Skeleton";
import { useDispatch, useSelector } from "react-redux";
import { getChildSubCategories } from "../../../store/slices/homeSlice";
import { Cards } from "../../../components/cards/Cards";
import { Title } from "../../../components/animate/Title";
import "./Sub.scss";
import { APP_BASE_URL } from "../../../apis/config";

const Sub = ({ id, parent, title }) => {
  const combinedText = `${parent} - ${title}`;

  const { language, childSubcategories, bgImage } = useSelector((state => state.home))
  
  const dispatch = useDispatch();

  useEffect(() => {
    dispatch(getChildSubCategories({ id, language }))
  }, [dispatch, id, language])

  return (
    <section className="sub" style={{
      backgroundImage: `url(${APP_BASE_URL + bgImage})`,
      backgroundSize: "cover",
      backgroundBlendMode: "overlay",
      backgroundColor: "rgba(255, 255, 255, 0.5)"
    }}>
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
