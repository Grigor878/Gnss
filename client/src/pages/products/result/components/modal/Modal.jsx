import React, { useState } from 'react'
import './Modal.scss'
import { useLocation } from 'react-router-dom'
import { oops } from '../../../../../components/swal/swal'

export const Modal = ({ open, setOpen }) => {
    const { id } = useLocation()
    console.log(id);

    const [mail, setMail] = useState("")
    const [phone, setPhone] = useState("")
    const [fullname, setFullname] = useState("")
    const [company, setCompany] = useState("")
    const [count, setCount] = useState(1)
    const [notes, setNotes] = useState("")

    const check = !mail || !phone || count === 0
    console.log(check);

    const handleSubmit = (e) => {
        e.preventDefault()

        const data = {
            id, mail, phone, fullname, company, count, notes
        }

        if (check) {
            return oops("Complete required fields!")
        } else {
            console.log(data);
        }
    }

    return (
        <div className={!open ? "modal-close" : "modal-open"}>
            <div className='modal__card'>

                <h2>Text</h2>

                <form className='modal__card-form' id="productForm" onSubmit={handleSubmit}>
                    <input type="email" value={mail} onChange={(e) => setMail(e.target.value)} placeholder='Email *' />
                    <input type="text" value={phone} onChange={(e) => setPhone(e.target.value)} placeholder='Phone *' />
                    <input type="text" value={fullname} onChange={(e) => setFullname(e.target.value)} placeholder='Fullname' />
                    <input type="text" value={company} onChange={(e) => setCompany(e.target.value)} placeholder='Company' />
                    <input type="number" value={count} onChange={(e) => setCount(e.target.value)} placeholder='Count' />
                    <input type="text" value={notes} onChange={(e) => setNotes(e.target.value)} placeholder='Notes' />
                </form>

                <div className='modal__card-btns'>
                    <button
                        type='button'
                        className='modal__card-discard'
                        onClick={() => setOpen(false)}
                    >
                        Չեղարկել
                    </button>

                    <button
                        type='submit'
                        form="productForm"
                        className='modal__card-post'
                    // onClick={() => setOpen(false)}
                    >
                        Ուղարկել
                    </button>
                </div>
            </div>
        </div>
    )
}
