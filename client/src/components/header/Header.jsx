import React from 'react'
import { Link } from 'react-router-dom'
import Language from './components/language/Language'
import Routes from './components/routes/Routes'
import logo from '../../assets/imgs/logo.png'
import './Header.scss'

export const Header = () => {
    return (
        <header className='header'>
            <div className="container">
                <div className="header__nav">
                    <Link to='/' onClick={() => window.scrollTo(0, 0)}>
                        <img className='header__nav-logo' src={logo} alt="logo" />
                    </Link>

                    <Routes />

                    <Language />
                </div>
            </div>
        </header>
    )
}
