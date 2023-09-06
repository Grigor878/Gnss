import React from "react";
import "./Sub.scss";

const Sub = ({ parent, title }) => {
  return (
    <section className="sub">
      <div className="container">
        <h2>{parent} - {title}</h2>
      </div>
    </section>
  );
};

export default Sub;
