import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from 'react-redux'
import { getPartners } from "../../store/slices/homeSlice";
import { Title } from "../../components/animate/Title";
import { aboutImages } from "./data";
import { FullScreenSlide } from "../../components/fullScreenSlide/FullScreenSlide";
import "./About.scss";

const About = () => {
  const [fullscreenImageIndex, setFullscreenImageIndex] = useState(0);
  const [fullscreenOpen, setFullscreenOpen] = useState(false);

  const sliderImages =
    aboutImages?.map(({ image }) => ({
      original: image,
      thumbnail: image,
    })) || [];

  const openFullscreen = (index) => {
    setFullscreenImageIndex(index);
    setFullscreenOpen(true);
  };

  const closeFullscreen = () => {
    setFullscreenOpen(false);
  };

  fullscreenOpen
    ? (document.body.style.overflow = "hidden")
    : (document.body.style.overflow = "auto");

  const dispatch = useDispatch()

  useEffect(() => {
    dispatch(getPartners())
  }, [dispatch])

  const { partners } = useSelector((state) => state.home)
  console.log(partners)

  return (
    <section className="about">
      <div className="container">
        <Title text="About Page" />

        <div className="about">
          <div className="about__main">
            <h3>
              Authorized distributor for Leica LLC in the Republic of Armenia
            </h3>

            <div className="about__main-context">
              <div
                className="about__main-context-img"
                onClick={() => openFullscreen(0)}
              >
                {aboutImages?.slice(0, 1)?.map(({ image, id }) => (
                  <img key={id} src={image} alt="About-Us" />
                ))}
              </div>

              <p>
                Our company was founded in 2000 and since then has been
                successfully operating in the field of importing various types
                of high-tech equipment to Armenia. Geo-Nal LLC has started its
                first cooperation with the Swiss company Leica Geosystems, which
                is one of the largest manufacturers and producers of
                metrographic and geodetic systems in the world. At present, our
                company offers a wide range of equipment for construction,
                mining and other industries, from more than 10 leading German,
                Swiss and Italian companies. Since 2007 our company has been
                engaged in the import of medical equipment. Our first partner in
                this field is the German company Leica Microsystems, which is
                one of the most well-known and reputable companies in the world
                in the production of various types of microscopes. We also
                represent other well-known companies producing ophthalmology,
                dentistry, histology and other research equipment.
              </p>
            </div>

            <div className="about__main-imgs">
              {aboutImages?.slice(1, 5)?.map(({ image, id }) => {
                return (
                  <div
                    key={id}
                    className="about__main-imgs-img"
                    onClick={() => openFullscreen(id)}
                  >
                    <img src={image} alt={`About-Us${id}`} />
                  </div>
                );
              })}
            </div>
          </div>
        </div>

        {fullscreenOpen && (
          <div className="fullscreen-overlay">
            <FullScreenSlide
              images={sliderImages}
              startIndex={fullscreenImageIndex}
              onClose={closeFullscreen}
            />
          </div>
        )}

        <div className="about__partners">
          <h3>Partners</h3>
          <div className="about__partners-block">
            {partners?.map(({ id, title, image }) => {
              return (
                <div key={id} className="about__partners-card">
                  <img src={"http://gnss.admin.loc/storage/" + image} alt={title} />
                  {/* <h6>{title}</h6> */}
                </div>
              )
            })}
          </div>
        </div>
      </div>
    </section>
  );
};

export default About;
