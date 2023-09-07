import React from "react";
import { useSelector } from "react-redux";
// import { productsMain } from "../../view/data";
import { Cards } from "../../components/cards/Cards";
import Skeleton from "../../components/skeleton/Skeleton";
import "./Home.scss";

const Home = () => {
  const { categories } = useSelector((state) => state.home);

  return (
    <section className="home">
      <div className="container">
        <h2 data-aos="fade-left" data-aos-duration="1500">Home</h2>

        {!categories?.length ? (
          <div className="skeleton__cards">
            <Skeleton type="cards" />
          </div>
        ) : (
          <Cards data={categories} />
        )}
      </div>
    </section>
  );
};

export default Home;
