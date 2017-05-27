import React from 'react';
import {Link} from 'react-router';

class Navigation extends React.Component {

    render () {

        return (
            <nav className="umd-navbar umd-navbar--unlogged navbar justify-content-start flex-row">
                <a className="navbar-brand" href="#"><i className="demo-icon icon-logo"></i></a>
                <ul className="navbar-nav flex-row">
                    <li className="nav-item active">
                        <a className="nav-link" href="#"><i className="demo-icon icon-music"></i> <span className="sr-only">(current)</span></a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="#">
                            <i className="demo-icon icon-user"></i>
                        </a>
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
