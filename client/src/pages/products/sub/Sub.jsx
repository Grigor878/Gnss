import React, { useEffect } from "react";
import { Title } from "../../../components/animate/Title";
import "./Sub.scss";
import { useDispatch, useSelector } from "react-redux";
import { getAllProducts } from "../../../store/slices/homeSlice";
import { Link } from "react-router-dom";

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

        {products && products.map((el) => {
          return (
            <Link to={el.path} key={el.id}>
              <Title text={el.title} />
              <img style={{ width: "55px", height: "55px" }} src={`http://gnss.admin.loc/storage/` + el.images[0]} alt={el.images} />
            </Link>

          )
        })}
      </div>
    </section>
  );
};

export default Sub;
