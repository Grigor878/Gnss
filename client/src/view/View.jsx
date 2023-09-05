import React, { lazy, Suspense } from "react";
import pMinDelay from "p-min-delay";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
// import { Loader } from "../components/loader/Loader"
import Layout from "../components/layout/Layout";
import { productsMain, productsSub } from "./data";

const Home = lazy(() => pMinDelay(import("../pages/home/Home"), 1000));

const About = lazy(() => pMinDelay(import("../pages/about/About"), 500));
const Contact = lazy(() => pMinDelay(import("../pages/contact/Contact"), 500));
const Single = lazy(() =>
  pMinDelay(import("../pages/productsPages/single/Single"), 500)
);
const Products = lazy(() =>
  pMinDelay(import("../pages/productsPages/products/Products"), 500)
);
const NotFound = lazy(() => pMinDelay(import("../pages/404/NotFound"), 500));

const View = () => {
  return (
    <Router>
      <Suspense fallback={null}>
        <Routes>
          <Route path="/" element={<Layout />}>
            <Route index element={<Home />} />
            {/* Main Categories of products */}
            {productsMain.map(({ title, path }) => {
              return (
                <Route
                  key={title}
                  path={path}
                  element={<Single title={title} />}
                />
              );
            })}
            {/* Sub Categories of products */}
            {productsSub.map(({ title, path, parent }) => {
              return (
                <Route
                  key={title}
                  path={path}
                  element={<Products parent={parent} title={title} />}
                />
              );
            })}
            <Route path="about" element={<About />} />
            <Route path="contact" element={<Contact />} />
            <Route path="*" element={<NotFound />} />
          </Route>
        </Routes>
      </Suspense>
    </Router>
  );
};

export default View;

/* <Route path="for-rent" element={<Rent />} />
<Route path="for-rent/:id" element={<SubRent />} />
<Route path="for-sale" element={<Sale />} />
<Route path="for-sale/:id" element={<SubSale />} />
<Route path="our-services" element={<Services />} /> */
