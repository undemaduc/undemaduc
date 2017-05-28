import React from 'react';
import {Link} from 'react-router';

class Navigation extends React.Component {

    render () {

        return (
            <nav className="umd-navbar navbar justify-content-start flex-row">
                <a className="navbar-brand" href="#"><i className="demo-icon icon-logo"></i></a>
                <ul className="navbar-nav flex-row">
                    <li className="nav-item">
                        <Link to="/events" className="nav-link"><i className="demo-icon icon-music"></i></Link>
                    </li>
                    <li className="nav-item">
                        <Link to="/events" className="nav-link"><i className="demo-icon icon-user"></i></Link>
                    </li>
                    <li className="nav-item nav-item--last ml-auto">
                        <a className="nav-link" href="#">
                            <i className="demo-icon icon-gear"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        );

    }

}

export default Navigation;
