import React, { useEffect } from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { getHeaderRoutes } from '../../../../store/slices/homeSlice'
import { NavLink } from 'react-router-dom'
import './Routes.scss'

const Routes = () => {
    const { language, routes } = useSelector((state => state.home))

    const dispatch = useDispatch()

    useEffect(() => {
        dispatch(getHeaderRoutes(language))
    }, [dispatch, language])

    console.log(routes)

    return (
        routes &&
        <div className='routes'>
            {routes?.map(({ id, path, title, categories }) => {
                return (
                    <div key={id}>
                        <NavLink to={path} className="routes__link" >{title}</NavLink>

                        <ul>
                            {categories?.map(({ path, title }, index) => {
                                return (
                                    <li key={index}>
                                        <NavLink to={path}>{title}</NavLink>
                                    </li>
                                )
                            })}
                        </ul>
                    </div>
                )
            })}
        </div>
    )
}
export default Routes