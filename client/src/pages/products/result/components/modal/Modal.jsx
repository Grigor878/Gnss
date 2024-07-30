import React, { useRef, useState } from 'react'
import { useTranslation } from "react-i18next";
import { useParams } from 'react-router-dom'
import useOutsideClick from '../../../../../hooks/useOutsideClick'
import { oops, success } from '../../../../../components/swal/swal'
import { order } from '../../../../../store/slices/homeSlice';
import { useDispatch, useSelector } from 'react-redux'
import './Modal.scss'

export const Modal = ({ open, setOpen }) => {
    const { t } = useTranslation()
    const { id } = useParams()

    const modalRef = useRef()
    useOutsideClick(modalRef, open, setOpen)

    const [mail, setMail] = useState("")
    const [phone, setPhone] = useState("")
    const [fullname, setFullname] = useState("")
    const [company, setCompany] = useState("")
    const [count, setCount] = useState()
    const [notes, setNotes] = useState("")

    const check = !mail || !phone || count === 0

    const { orderStatus } = useSelector((state) => state.home);

    function statusChecking() {
        if (orderStatus === 200 || orderStatus === "200") {
            setMail("")
            setPhone("")
            setFullname("")
            setCompany("")
            setCount()
            setNotes("")
            setOpen(!open)
            success(t("orderSuccess"))
        } else {
            oops(t("orderError"))
        }
    }

    const dispatch = useDispatch()

    const handleSubmit = (e) => {
        e.preventDefault()

        const orderData = {
            id, mail, phone, fullname, company, count, notes
        }

        if (check) {
            return oops(t("attention"))
        } 
        else {
            dispatch(order({ orderData })).then(() => {
                statusChecking()
            })
        }
    }

    return (
        <div className={!open ? "modal-close" : "modal-open"}>
            <div className='modal__card' ref={modalRef}>

                <h2>{t("orderTitle")}</h2>

                <form className='modal__card-form' id="productForm" onSubmit={handleSubmit}>
                    <input type="email" value={mail} onChange={(e) => setMail(e.target.value)} placeholder={`${t("mail")} *`} />
                    <input type="text" value={phone} onChange={(e) => setPhone(e.target.value)} placeholder={`${t("phone")} *`} />
                    <input type="text" value={fullname} onChange={(e) => setFullname(e.target.value)} placeholder={t("fullname")} />
                    <input type="text" value={company} onChange={(e) => setCompany(e.target.value)} placeholder={t("company")} />
                    <input type="number" value={count} onChange={(e) => setCount(e.target.value)} placeholder={t("count")} />
                    <input type="text" value={notes} onChange={(e) => setNotes(e.target.value)} placeholder={t("notes")} />
                </form>

                <div className='modal__card-btns'>
                    <button
                        type='button'
                        className='modal__card-discard'
                        onClick={() => setOpen(false)}
                    >
                        {t("discard")}
                    </button>

                    <button
                        type='submit'
                        form="productForm"
                        className='modal__card-post'
                    >
                        {t("send")}
                    </button>
                </div>
            </div>
        </div>
    )
}
