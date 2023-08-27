import React from 'react'
import progress from '../../assets/imgs/progress.png'
import './About.scss'

const About = () => {
    return (
        <section className='about'>
            <div className="container">
                {/* <h2>About Page</h2> */}
                <img src={progress} alt="Work in progress" />
            </div>
        </section>
    )
}

export default About