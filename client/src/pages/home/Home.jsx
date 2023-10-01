import React from "react";
import { useSelector } from "react-redux";
import { useTranslation } from 'react-i18next'
// import { productsMain } from "../../view/data";
import { Cards } from "../../components/cards/Cards";
import Skeleton from "../../components/skeleton/Skeleton";
import { Title } from "../../components/animate/Title";
import "./Home.scss";

const Home = () => {
  const { allCategories } = useSelector((state) => state.home);

  const { t } = useTranslation()

  return (
    <section className="home">
      <div className="container">
        <Title text={t("home")} />
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
