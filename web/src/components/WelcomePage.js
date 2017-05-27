import React from 'react';
import {Link} from 'react-router';

const WelcomePage = () => {
    return (
        <div className="umd-setup-container umd-login-page">

            <h1>Welcome,</h1>
            <Link to="location-user-login-page">I'm looking for a place</Link>
            <Link to="user-login-page">I offer a place</Link>

        </div>
    );
};

export default WelcomePage;
