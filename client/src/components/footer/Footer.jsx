import React from "react";
import { NavLink } from "react-router-dom";
import { getCurrentYear } from "../../helpers/utils";
import logo from "../../assets/imgs/logo.png";
import {
  BiLogoFacebook,
  BiLogoTwitter,
  BiLogoInstagram,
  BiLogoGmail,
} from "react-icons/bi";
import { HiPhone } from "react-icons/hi";
import { productsMain, productsSub } from "../../view/data";
import { mainPages } from "./data";
import "./Footer.scss";

export const Footer = () => {
  return (
    <footer className="footer">
      <div className="container">
        <div className="footer__top">
          <div className="footer__top-right">
            <img src={logo} alt="Logo" className="footer__top-right-logo" />

            <div className="footer__top-right-social">
              <a
                href="tel:+37410584873"
                className="footer__top-right-social-link"
              >
                <HiPhone />
              </a>
              <a
                href="mailto:info@leica.am"
                className="footer__top-right-social-link"
              >
                <BiLogoGmail />
              </a>
            </div>

            <div className="footer__top-right-social">
              <a
                href="https://facebook.com"
                target="_blank"
                className="footer__top-right-social-link"
              >
                <BiLogoFacebook />
              </a>
              <a
                href="https://facebook.com"
                target="_blank"
                className="footer__top-right-social-link"
              >
                <BiLogoTwitter />
              </a>
              <a
                href="https://facebook.com"
                target="_blank"
                className="footer__top-right-social-link"
              >
                <BiLogoInstagram />
              </a>
            </div>
          </div>

          <div className="footer__top-left">
            <div className="footer__top-left-card">
              <h3>Main Pages</h3>
              <ul className="footer__top-left-card-list">
                {mainPages?.map(({ id, title, path }) => {
                  return (
                    <li key={id}>
                      <NavLink className="footer__top-left-card-link" to={path}>
                        {title}
                      </NavLink>
                    </li>
                  );
                })}
              </ul>
            </div>

            <div className="footer__top-left-card">
              <h3>Categories</h3>
              <ul className="footer__top-left-card-list">
                {productsMain?.map(({ id, title, path }) => {
                  return (
                    <li key={id}>
                      <NavLink className="footer__top-left-card-link" to={path}>
                        {title}
                      </NavLink>
                    </li>
                  );
                })}
              </ul>
            </div>

            <div className="footer__top-left-card">
              <h3>Sub Categories</h3>
              <ul className="footer__top-left-card-list">
                {productsSub?.map(({ id, title, path }) => {
                  return (
                    <li key={id}>
                      <NavLink className="footer__top-left-card-link" to={path}>
                        {title}
                      </NavLink>
                    </li>
                  );
                })}
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div className="footer__bottom">
        <div className="container">
          <div className="footer__bottom-main">
            <p>ⓒ GNSS {getCurrentYear()} | All Rights Reserved</p>
            <p>
              Website design & development -{" "}
              <a href="https://gsdev.am" target="_blank">
                GS Development
              </a>
            </p>
          </div>
        </div>
      </div>
    </footer>
  );
};
