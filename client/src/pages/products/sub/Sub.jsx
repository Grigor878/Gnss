import React from "react";
import { Title } from "../../../components/animate/Title";
import "./Sub.scss";

const Sub = ({ parent, title }) => {
  const combinedText = `${parent} - ${title}`;
  return (
    <section className="sub">
      <div className="container">
        <Title text={combinedText} />
      </div>
    </section>
  );
};

export default Sub;
