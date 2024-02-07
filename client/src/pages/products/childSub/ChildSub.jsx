import React, { useEffect } from 'react';
import { useTranslation } from 'react-i18next';
import { Title } from "../../../components/animate/Title";
import { useDispatch, useSelector } from "react-redux";
import { getAllProducts } from "../../../store/slices/homeSlice";
import { Link } from "react-router-dom";
import { capitalizeText } from "../../../helpers/formatters";
import { APP_BASE_URL } from '../../../apis/config';
import noImg from '../../../assets/imgs/noImg.png'
import { Loader } from "../../../components/loader/Loader";
import './ChildSub.scss'

const ChildSub = ({ id, parent, title }) => {
    const { t } = useTranslation()

    const combinedText = `${parent} - ${title}`;

    const { language, products } = useSelector((state => state.home))

    const dispatch = useDispatch();

    useEffect(() => {
        dispatch(getAllProducts({ id, language }))
    }, [dispatch, id, language])

    return (
        <section className="childSub">
            <div className="container">
                <Title text={combinedText} />

                {!products?.length
                    ? <Loader />
                    : <div className="childSub__block">
                        {products.map((el) => {
                            return (
                                <Link to={el.path} key={el.id} className="childSub__card">
                                    <img
                                        src={el.images?.length ? APP_BASE_URL + el.images[0] : noImg}
                                        alt="productImg" />
                                    <h3>{capitalizeText(el.title)}</h3>
                                    <span>{t("see_more")}</span>
                                </Link>
                            )
                        })}
                    </div>}
            </div>
        </section>
    );
}

export default ChildSub