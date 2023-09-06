import React from "react";
// import { useSelector } from "react-redux";
import { productsMain } from "../../view/data";
import { Cards } from "../../components/cards/Cards";
import "./Home.scss";
import Skeleton from "../../components/skeleton/Skeleton";

const Home = () => {
  // const { categories } = useSelector((state) => state.home);
  // console.log(categories);


  return (
    <section className="home">
      <div className="container">
        <h2>Home</h2>

     {!productsMain
      ? <div className="skeleton__cards">
          <Skeleton type="cards"/>
        </div>
      : <Cards data={productsMain} />}
      </div>
    </section>
  );
};

export default Home;
