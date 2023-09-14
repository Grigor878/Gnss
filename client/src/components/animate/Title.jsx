import React from "react";
import Zoom from "react-reveal/Zoom";
import { capitalizeText } from "../../helpers/formatters";
import "./styles.scss";
import { useLocation } from "react-router-dom";

export const Title = ({ text }) => {
  const { pathname } = useLocation()

  return (
    <Zoom cascade>
      {pathname?.includes('/product')
        ? <h2 className="title">{text}</h2>
        : <h2 className="title">{capitalizeText(text)}</h2>
      }
    </Zoom>
  );
};
