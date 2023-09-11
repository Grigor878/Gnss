import React from "react";
import { useSelector } from "react-redux";
// import { productsMain } from "../../view/data";
import { Cards } from "../../components/cards/Cards";
import Skeleton from "../../components/skeleton/Skeleton";
import "./Home.scss";
import { Title } from "../../components/animate/Title";

const Home = () => {
  const { allCategories } = useSelector((state) => state.home);

  return (
    <section className="home">
      <div className="container">
        <Title text="Home" />
        {/* <h2 data-aos="fade-left" data-aos-duration="1500">Home</h2> */}

        {!allCategories?.length ? (
          <div className="skeleton__cards">
            <Skeleton type="cards" />
          </div>
        ) : (
          <Cards data={allCategories} />
        )}
      </div>
    </section>
  );
};

export default Home;
