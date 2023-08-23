import React from 'react'
import './Contact.scss'

const Contact = () => {
    return (
        <section className='contact'>
            <div className="container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3048.545076031706!2d44.51626567591104!3d40.174681470335955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abcf6b4bd94e3%3A0x115c5e9db37d4cd7!2s13%20Khanjyan%20pokhoc%2C%20Yerevan%200010!5e0!3m2!1sru!2sam!4v1692824458304!5m2!1sru!2sam"
                    width="600"
                    height="450"
                    style={{ border: 0 }}
                    allowFullScreen=""
                    loading="lazy"
                    referrerPolicy="no-referrer-when-downgrade"
                >

                </iframe>
            </div>
        </section>
    )
}

export default Contact