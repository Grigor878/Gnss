import React from "react";
import { Link } from "react-router-dom";
import Language from "./components/language/Language";
import Routes from "./components/routes/Routes";
import logo from "../../assets/imgs/logo.png";
import "./Header.scss";

export const Header = () => {
  return (
    <header className="header">
      <div className="container">
        <div className="header__nav">
          <div className="header__nav-logo">
            <Link
              to="/"
              onClick={() => window.scrollTo(0, 0)}
              className="header__nav-link"
            >
              <img className="header__nav-icon" src={logo} alt="logo" />
            </Link>

            <div className="header__nav-text">
                <p>Smart</p>
                <p>Solutions</p>
                <p><span>For </span>Success</p>
            </div>
          </div>

          <div className="header__nav-right">
            <Routes />

            <Language />
          </div>
        </div>
      </div>
    </header>
  );
};
