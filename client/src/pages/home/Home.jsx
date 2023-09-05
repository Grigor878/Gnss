import React from 'react'
import { useSelector } from 'react-redux'
import './Home.scss'

const Home = () => {
  const { categories } = useSelector((state => state.home))
  console.log(categories)

  return (
    <section className='home'>
      <div className="container">
        <h2>Home</h2>
      </div>
    </section>
  )
}

export default Home