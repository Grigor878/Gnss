import React, { lazy, Suspense, useEffect } from "react";
import pMinDelay from "p-min-delay";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
// import { Loader } from "../components/loader/Loader"
import Layout from "../components/layout/Layout";
import { getCategories } from "../store/slices/homeSlice";
import { useDispatch, useSelector } from "react-redux";
import { productsMain, productsSub } from "./data";

const Home = lazy(() => pMinDelay(import("../pages/home/Home"), 1000));
const About = lazy(() => pMinDelay(import("../pages/about/About"), 500));
const Contact = lazy(() => pMinDelay(import("../pages/contact/Contact"), 500));
const Categories = lazy(() => pMinDelay(import("../pages/products/categories/Categories"), 500));
const Sub = lazy(() => pMinDelay(import("../pages/products/sub/Sub"), 500));
// const Result = lazy(() => pMinDelay(import("../pages/products/result/Result"), 500));
const NotFound = lazy(() => pMinDelay(import("../pages/404/NotFound"), 500));


const View = () => {
  const { language, categories } = useSelector((state => state.home))
  console.log(categories);//
  const dispatch = useDispatch()
  
  useEffect(() => {
    dispatch(getCategories(language)) // kpoxarini productsMain in
  }, [dispatch, language])

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
                  element={<Categories title={title} />}
                />
              );
            })}
            {/* Sub Categories of products */}
            {productsSub.map(({ title, path, parent }) => {
              return (
                <Route
                  key={title}
                  path={path}
                  element={<Sub parent={parent} title={title} />}
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
