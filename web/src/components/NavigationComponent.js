import React from 'react';
import { Link } from 'react-router';
import autoBind from 'react-autobind';

class Navigation extends React.Component {
    constructor(props) {
        super(props);
        autoBind(this);
    }

    isLoggedin() {
        const { user, luser } = this.props.user;
        return Object.keys(user).length > 0 || Object.keys(luser).length > 0;
    }

    render() {
        const navbar = this.isLoggedin() ? (
            <ul className="navbar-nav flex-row">
                <li className="nav-item">
                    <Link to="/events" className="nav-link"><i className="demo-icon icon-music" /></Link>
                </li>
                <li className="nav-item">
                    <Link to="/my-profile" className="nav-link"><i className="demo-icon icon-user" /></Link>
                </li>
                <li className="nav-item nav-item--last ml-auto">
                    <a className="nav-link" href="#">
                        <i className="demo-icon icon-gear" />
                    </a>
                </li>
            </ul>
        ) : null;


        return (
            <nav className="umd-navbar navbar justify-content-start flex-row">
                <a className="navbar-brand" href="#"><i className="demo-icon icon-logo" /></a>
                {navbar}
            </nav>
        );
    }
}

export default Navigation;
