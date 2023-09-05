import React, { useEffect, useRef, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { getHeaderRoutes } from "../../../../store/slices/homeSlice";
import { NavLink } from "react-router-dom";
import useOutsideClick from "../../../../hooks/useOutsideClick";
import { MdArrowDropDown } from "react-icons/md";
// import { routes } from "./data";
import "./Routes.scss";

const Routes = () => {
  const { language, routes } = useSelector((state => state.home))

  const dispatch = useDispatch()

  useEffect(() => {
      dispatch(getHeaderRoutes(language))
  }, [dispatch, language])

  const routesRef = useRef();

  const [open, setopen] = useState(false);

  useOutsideClick(routesRef, open, setopen);

  return (
    routes && (
      <div className="routes">
        {routes?.map(({ id, path, title, categories }) => {
          return (
            <div key={id} ref={routesRef}>
              <NavLink
                to={path !== "/products" ? path : null}
                onClick={() => (path === "/products" ? setopen(!open) : null)}
                className={({ isActive }) =>
                  isActive && path !== "/products"
                    ? "routes__link active"
                    : "routes__link"
                }
              >
                {" "}
                {title}
                {path === "/products" ? <MdArrowDropDown className="routes__link-down"/> : null}
              </NavLink>

              <ul
                className={!open ? "routes__dropdown" : "routes__dropdownOpen"}
              >
                {categories?.map(({ path, title }, index) => {
                  return (
                    <li key={index} onClick={() => setopen(!open)}>
                      <NavLink to={path} className="routes__link">
                        {title}
                      </NavLink>
                    </li>
                  );
                })}
              </ul>
            </div>
          );
        })}
      </div>
    )
  );
};
export default Routes;
