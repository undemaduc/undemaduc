import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-router';

import LoginButtonComponent from './LoginButtonComponent';

class LuserLoginComponent extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        console.log("LUSER LOGIN PROPS => ", this.props);
        return (
            <div className="umd-location-login">

                <div className="location-login__form-container">

                    <div className="form-group">
                        <input type="email" className="form-control umd-form-control" placeholder="Email" autoFocus />
                    </div>

                    <div className="form-group">
                        <input type="password" className="form-control umd-form-control" placeholder="Password" />
                    </div>

                    <LoginButtonComponent buttonLabel="Login"
                        className="btn btn-primary btn-lg btn-block umd-btn umd-btn--icon-right"
                        onButtonClick={this.props.loginLuser}
                        iconClassName="demo-icon icon-arrow-right icon" />

                    <Link to="/register" className="register">Register</Link>

                </div>

            </div>
        );
    }
}

LuserLoginComponent.propTypes = {
    loginLuser: PropTypes.func.isRequired
};

export default LuserLoginComponent;
