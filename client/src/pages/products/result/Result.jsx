import React, { useEffect } from 'react'
import { useLocation } from 'react-router-dom'
import './Result.scss'
import { useDispatch, useSelector } from 'react-redux'
import { getSingleProduct } from '../../../store/slices/homeSlice'

const Result = () => {
    const { id } = useLocation()
    console.log(id)//
    const { language, singleProduct } = useSelector((state) => state.home)
    console.log(singleProduct)//

    const dispatch = useDispatch()

    useEffect(() => {
        dispatch(getSingleProduct({ id, language }))
    }, [dispatch, id, language])

    return (
        <section>
            <div className="container">
                <h2>Result</h2>
            </div>
        </section>
    )
}

export default Result