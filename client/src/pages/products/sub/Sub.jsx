import React, { useEffect } from "react";
import { Title } from "../../../components/animate/Title";
import "./Sub.scss";
import { useDispatch, useSelector } from "react-redux";
import { getAllProducts } from "../../../store/slices/homeSlice";

const Sub = ({ id, parent, title }) => {
  const combinedText = `${parent} - ${title}`;

  const { language, products } = useSelector((state => state.home))

  console.log(products)//

  const dispatch = useDispatch();

  useEffect(() => {
    dispatch(getAllProducts({ id, language }))
  }, [dispatch, id, language])

  return (
    <section className="sub">
      <div className="container">
        <Title text={combinedText} />


      </div>
    </section>
  );
};

export default Sub;
