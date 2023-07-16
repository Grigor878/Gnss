import React, { lazy, Suspense } from "react"
import { BrowserRouter as Router, Routes, Route } from "react-router-dom"
import { Loader } from "../components/loader/Loader"
import Layout from "../components/layout/Layout"
const Home = lazy(() => import('../pages/home/Home'))
const NotFound = lazy(() => import('../pages/404/NotFound'))
const About = lazy(() => import('../pages/about/About'))
const Contact = lazy(() => import('../pages/contact/Contact'))

const View = () => {
    return (
        <Router>
            <Suspense fallback={<Loader />}>
                <Routes>
                    <Route path="/" element={<Layout />}>
                        <Route index element={<Home />} />
                        {/* <Route path="for-rent" element={<Rent />} />
                        <Route path="for-rent/:id" element={<SubRent />} />
                        <Route path="for-sale" element={<Sale />} />
                        <Route path="for-sale/:id" element={<SubSale />} />
                        <Route path="our-services" element={<Services />} /> */}
                        <Route path="about-us" element={<About />} />
                        <Route path="contact-us" element={<Contact />} />
                        <Route path="*" element={<NotFound />} />
                    </Route>
                </Routes>
            </Suspense>
        </Router>
    )
}

export default View