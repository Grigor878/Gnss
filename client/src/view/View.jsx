import React, { lazy, Suspense } from "react"
import pMinDelay from 'p-min-delay'
import { BrowserRouter as Router, Routes, Route } from "react-router-dom"
// import { Loader } from "../components/loader/Loader"
import Layout from "../components/layout/Layout"

const Home = lazy(() => pMinDelay(import('../pages/home/Home'), 1000))

const About = lazy(() => pMinDelay(import('../pages/about/About'), 500))
const Contact = lazy(() => pMinDelay(import('../pages/contact/Contact'), 500))
const NotFound = lazy(() => pMinDelay(import('../pages/404/NotFound'), 500))

const View = () => {
    return (
        <Router>
            <Suspense fallback={null}>
                <Routes>
                    <Route path="/" element={<Layout />}>
                        <Route index element={<Home />} />
                        {/* <Route path="for-rent" element={<Rent />} />
                        <Route path="for-rent/:id" element={<SubRent />} />
                        <Route path="for-sale" element={<Sale />} />
                        <Route path="for-sale/:id" element={<SubSale />} />
                        <Route path="our-services" element={<Services />} /> */}
                        <Route path="about" element={<About />} />
                        <Route path="contact" element={<Contact />} />
                        <Route path="*" element={<NotFound />} />
                    </Route>
                </Routes>
            </Suspense>
        </Router>
    )
}

export default View