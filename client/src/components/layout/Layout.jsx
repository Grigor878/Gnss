import React, { Suspense, useEffect } from "react"
import AOS from 'aos'
import 'aos/dist/aos.css'
import { Header } from "../header/Header"
import { AutoScroll } from "../../helpers/autoScroll"
import { HelmetAsync } from "../helmetAsync/HelmetAsync"
import { Loader } from "../loader/Loader"
import { Outlet } from 'react-router-dom'
import { Footer } from "../footer/Footer"

const Layout = () => {
  useEffect(() => {
    AOS.init()
  }, [])

  return (
    <>
      <Header />
      <AutoScroll />
      <HelmetAsync />
      <Suspense fallback={<Loader />}>
        <Outlet />
      </Suspense >
      <Footer />
    </>
  )
}

export default Layout