import React from "react";
import Zoom from "react-reveal/Zoom";
import { capitalizeText } from "../../helpers/formatters";
import "./styles.scss";

export const Title = ({ text }) => {
  return (
    <Zoom cascade>
      <h2 className="title">{capitalizeText(text)}</h2>
    </Zoom>
  );
};
