import React from "react";
import "./Single.scss";

const Single = ({ title }) => {
  return (
    <section>
      <div className="container">
        <h2>{title}</h2>
      </div>
    </section>
  );
};

export default Single;
