import React, { useEffect } from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { getCategories } from '../../store/slices/homeSlice'
import './Home.scss'

const Home = () => {
  const { language, categories } = useSelector((state => state.home))

  const dispatch = useDispatch()

  useEffect(() => {
    dispatch(getCategories(language))
  }, [dispatch, language])

  console.log(categories)

  return (
    <section className='home'>
      <div className="container">
        <h1>Home</h1>
      </div>
    </section>
  )
}

export default Home