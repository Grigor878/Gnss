import React, { useEffect } from "react";
import { Title } from "../../../components/animate/Title";
import { useDispatch, useSelector } from "react-redux";
import { getAllProducts } from "../../../store/slices/homeSlice";
import { Link } from "react-router-dom";
import { capitalizeText } from "../../../helpers/formatters";
import noImg from '../../../assets/imgs/noImg.png'
import { Loader } from "../../../components/loader/Loader";
import "./Sub.scss";

const Sub = ({ id, parent, title }) => {
  const combinedText = `${parent} - ${title}`;

  const { language, products } = useSelector((state => state.home))

  const dispatch = useDispatch();

  useEffect(() => {
    dispatch(getAllProducts({ id, language }))
  }, [dispatch, id, language])

  return (
    <section className="sub">
      <div className="container">
        <Title text={combinedText} />

        {!products?.length
          ? <Loader />
          : <div className="sub__block">
            {products.map((el) => {
              return (
                <Link to={el.path} key={el.id} className="sub__card">
                  <img
                    src={el.images?.length ? `http://gnss.admin.loc/storage/` + el.images[0] : noImg}
                    alt="productImg" />
                  <h3>{capitalizeText(el.title)}</h3>
                  <span>See More</span>
                </Link>
              )
            })}
          </div>}
      </div>
    </section>
  );
};

export default Sub;
