import React from "react";
import { useTranslation } from "react-i18next";
import { useSelector } from "react-redux";
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
// import { productsMain, productsSub } from "../../view/data";
import { mainPagesAm, mainPagesEn } from "./data";
import "./Footer.scss";
import { capitalizeText, cutText } from "../../helpers/formatters";

export const Footer = () => {
  const { t } = useTranslation()

  const { allCategories, allSubCategories } = useSelector((state) => state.home);

  const { language } = useSelector((state) => state.home)

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
                href="https://www.facebook.com/leicaarmenia2020/"
                target="_blank"
                className="footer__top-right-social-link"
                rel="noreferrer"
              >
                <BiLogoFacebook />
              </a>
              <a
                href="https://facebook.com"
                target="_blank"
                className="footer__top-right-social-link"
                rel="noreferrer"
              >
                <BiLogoTwitter />
              </a>
              <a
                href="https://facebook.com"
                target="_blank"
                className="footer__top-right-social-link"
                rel="noreferrer"
              >
                <BiLogoInstagram />
              </a>
            </div>
          </div>

          <div className="footer__top-left">
            <div className="footer__top-left-card">
              <h3>{t("main_pages")}</h3>
              <ul className="footer__top-left-card-list">
                {language === "am"
                  ? mainPagesAm?.map(({ id, title, path }) => {
                    return (
                      <li key={id}>
                        <NavLink className="footer__top-left-card-link" to={path}>
                          {title}
                        </NavLink>
                      </li>
                    );
                  })
                  : mainPagesEn?.map(({ id, title, path }) => {
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
              <h3>{t("categories")}</h3>
              <ul className="footer__top-left-card-list">
                {allCategories?.map(({ id, title, path }) => {
                  return (
                    <li key={id}>
                      <NavLink className="footer__top-left-card-link" to={path}>
                        {capitalizeText(title)}
                      </NavLink>
                    </li>
                  );
                })}
              </ul>
            </div>

            <div className="footer__top-left-card">
              <h3>{t("sub_categories")}</h3>
              <ul className="footer__top-left-card-list">
                {allSubCategories?.map(({ id, title, path }) => {
                  return (
                    <li key={id}>
                      <NavLink className="footer__top-left-card-link" to={path}>
                        {language === "am" ? cutText(capitalizeText(title), 26) : capitalizeText(title)}
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
              <a href="https://gsdev.am" target="_blank" rel="noreferrer">
                GS Development
              </a>
            </p>
          </div>
        </div>
      </div>
    </footer>
  );
};
