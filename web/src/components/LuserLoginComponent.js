import React, { Component } from 'react';
import { Link } from 'react-router';
import autoBind from 'react-autobind';

import LoginButtonComponent from './LoginButtonComponent';

class LuserLoginComponent extends Component {
    constructor(props) {
        super(props);
        autoBind(this);

        this.state = {
            email: 'roliRupe@hack.tm',
            password: 'rupere'
        };
    }

    loginLuser() {
        const { email, password } = this.state;

        if (email && password) {
            return this.props.loginLuser(email, password);
        } else {
            alert("Fields missing.");
        }
    }

    onEmailChange(e) {
        const email = e.target.value;
        this.setState({ email });
    }

    onPasswordChange(e) {
        const password = e.target.value;
        this.setState({ password });
    }

    render() {
        return (
            <div className="umd-location-login">
                <div className="location-login__form-container">

                    <div className="form-group">
                        <input type="email" className="form-control umd-form-control"
                            placeholder="Email" autoFocus
                            value={this.state.email}
                            onChange={this.onEmailChange} />
                    </div>

                    <div className="form-group">
                        <input type="password" className="form-control umd-form-control"
                            placeholder="Password"
                            value={this.state.password}
                            onChange={this.onPasswordChange} />
                    </div>

                    <LoginButtonComponent buttonLabel="Login"
                        className="btn btn-primary btn-lg btn-block umd-btn umd-btn--icon-right"
                        onButtonClick={() => this.loginLuser()}
                        iconClassName="demo-icon icon-arrow-right icon" />

                    <Link to="/register" className="register">Register</Link>

                </div>
            </div>
        );
    }
}

export default LuserLoginComponent;
