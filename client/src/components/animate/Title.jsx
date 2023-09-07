import React from "react";
import Zoom from "react-reveal/Zoom";
import { capitalize } from "../../helpers/formatters";
import "./styles.scss";

export const Title = ({ text }) => {
  return (
    <Zoom cascade>
      <h2 className="title">{capitalize(text)}</h2>
    </Zoom>
  );
};
