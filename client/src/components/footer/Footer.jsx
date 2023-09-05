import React from "react";
import { getCurrentYear } from "../../helpers/utils";
import logo from "../../assets/imgs/logo.png";
import { BiLogoFacebook, BiLogoTwitter, BiLogoInstagram } from "react-icons/bi";
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

          <div className="footer__top-left">Left</div>
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
