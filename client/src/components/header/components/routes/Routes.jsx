import React, { useEffect, useRef, useState } from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { getHeaderRoutes } from '../../../../store/slices/homeSlice'
import { NavLink } from 'react-router-dom'
import './Routes.scss'
import useOutsideClick from '../../../../hooks/useOutsideClick'

const Routes = () => {
    const { language, routes } = useSelector((state => state.home))

    const dispatch = useDispatch()

    useEffect(() => {
        dispatch(getHeaderRoutes(language))
    }, [dispatch, language])

    const routesRef = useRef()

    const [open, setopen] = useState(false)

    useOutsideClick(routesRef, open, setopen)

    return (
        routes &&
        <div className='routes'>
            {routes?.map(({ id, path, title, categories }) => {
                return (
                    <div key={id} ref={routesRef}>
                        <NavLink
                            to={path !== "/products" ? path : null}
                            onClick={() => path === "/products" ? setopen(!open) : null}
                            className={({ isActive }) =>
                                isActive && path !== "/products" ? "routes__link active" : "routes__link"
                            }
                        > {title}
                        </NavLink >

                        <ul className={!open ? 'routes__dropdown' : "routes__dropdownOpen"}>
                            {categories?.map(({ path, title }, index) => {
                                return (
                                    <li key={index} onClick={()=>setopen(!open)}>
                                        <NavLink to={path} className="routes__link">{title}</NavLink>
                                    </li>
                                )
                            })}
                        </ul>
                    </div>
                )
            })}
        </div >
    )
}
export default Routes