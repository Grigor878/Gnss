import React, { lazy, Suspense } from "react"
import { BrowserRouter as Router, Routes, Route, Navigate } from "react-router-dom"
import { Loader } from "../components/loader/Loader"
import Layout from "../components/layout/Layout"

const NotFound = lazy(() => import('../pages/404/NotFound'))

const View = () => {
    return (
        <Router>
            <Suspense fallback={<Loader />}>
                <Routes>
                <Route path="/" element={<Layout />}>
                        {/* <Route index element={<Home />} />
                        <Route path="for-rent" element={<Rent />} />
                        <Route path="for-rent/:id" element={<SubRent />} />
                        <Route path="for-sale" element={<Sale />} />
                        <Route path="for-sale/:id" element={<SubSale />} />
                        <Route path="our-services" element={<Services />} />
                        <Route path="contact-us" element={<Contact />} /> */}
                        <Route path="*" element={<NotFound />} />
                    </Route>
                </Routes>
            </Suspense>
        </Router>
    )
}

export default View