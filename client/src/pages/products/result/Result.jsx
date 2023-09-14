import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom'
import { useDispatch, useSelector } from 'react-redux'
import { getSingleProduct } from '../../../store/slices/homeSlice'
import { Title } from '../../../components/animate/Title'
import { BsFillCalendarCheckFill } from 'react-icons/bs'
import noImg from '../../../assets/imgs/noImg.png'
import { moneyFormater } from '../../../helpers/formatters'
import { FullScreenSlide } from '../../../components/fullScreenSlide/FullScreenSlide'
import './Result.scss'
import { Loader } from '../../../components/loader/Loader'

const Result = () => {
    const { id } = useParams()

    const { language, singleProduct } = useSelector((state) => state.home)

    const dispatch = useDispatch()

    useEffect(() => {
        dispatch(getSingleProduct({ id, language }))
    }, [dispatch, id, language])

    // const navigate = useNavigate()

    const [fullscreenImageIndex, setFullscreenImageIndex] = useState(0);
    const [fullscreenOpen, setFullscreenOpen] = useState(false);

    const sliderImages =
        singleProduct?.images?.map((url) => ({
            original: "http://gnss.admin.loc/storage/" + url,
            thumbnail: "http://gnss.admin.loc/storage/" + url
        }) || []);

    const openFullscreen = (index) => {
        setFullscreenImageIndex(index);
        setFullscreenOpen(true);
    };

    const closeFullscreen = () => {
        setFullscreenOpen(false);
    };

    fullscreenOpen
        ? (document.body.style.overflow = "hidden")
        : (document.body.style.overflow = "auto");

    return (
        singleProduct?.length
            ? <Loader />
            : <section className='result'>
                <div className="container">
                    {/* <div className='result__top'> */}
                    <Title text={singleProduct?.title} />
                    {/* <button onClick={() => navigate(-1)}>Go Back</button>
                </div> */}

                    {singleProduct &&
                        <div className='result__main'>
                            <div className='result__main-top'>
                                <p>{moneyFormater(singleProduct?.price)}</p>
                                <span><BsFillCalendarCheckFill /> {singleProduct?.updated_at}</span>
                            </div>

                            <div className='result__main-context'>
                                <div
                                    className="result__main-context-img"
                                    onClick={() => openFullscreen(0)}
                                >
                                    <img
                                        src={singleProduct?.images?.length ? `http://gnss.admin.loc/storage/` + singleProduct?.images[0] : noImg}
                                        alt="productImg"
                                    />
                                </div>

                                <p>{singleProduct?.description}</p>
                            </div>

                            <div className="result__main-imgs">
                                {sliderImages?.slice(1, 5)?.map((el, index) => {
                                    return (
                                        <div
                                            key={el.original}
                                            className="result__main-imgs-img"
                                            onClick={() => openFullscreen(index + 1)}
                                        >
                                            <img src={el.original} alt="productImgs" />
                                        </div>
                                    );
                                })}
                            </div>
                        </div>
                    }

                    {fullscreenOpen && (
                        <div className="fullscreen-overlay">
                            <FullScreenSlide
                                images={sliderImages}
                                startIndex={fullscreenImageIndex}
                                onClose={closeFullscreen}
                            />
                        </div>
                    )}

                </div>
            </section >
    )
}

export default Result