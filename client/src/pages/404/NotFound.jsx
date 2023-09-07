import React from "react";
import { useNavigate } from "react-router-dom";
import "./NotFound.scss";

const NotFound = () => {
  const navigate = useNavigate();
  return (
    <section className="notFound">
      <div className="container">
        <div className="notFound__card">
          <h2>Oops, Page Not Found !</h2>
          <button onClick={() => navigate(-1)}>Go Back</button>
        </div>
      </div>
    </section>
  );
};

export default NotFound;
