import React, { Component } from 'react';
// import { Link } from 'react-router';
// import autoBind from 'react-autobind';

import LoginButtonComponent from './LoginButtonComponent';

class UserLoginComponent extends Component {
    constructor(props) {
        super(props);
        // autoBind(this);
    }

    loginUser() {
        // const { email, password } = this.state;
        // if (email && password) {
        return this.props.loginUser('victor@hack.tm', 'rupere');
        // } else {
        //     alert("Fields missing.");
        // }
    }

    // onEmailChange(e) {
    //     const email = e.target.value;
    //     this.setState({ email });
    // }

    // onPasswordChange(e) {
    //     const password = e.target.value;
    //     this.setState({ password });
    // }

    render() {
        return (
            <div>
                {/*<div className="umd-location-login">
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
                    </div>*/}
                <LoginButtonComponent buttonLabel="Login with facebook"
                    className="btn btn-primary btn-lg btn-block umd-btn umd-btn--facebook content-action__button--force-bottom umd-btn--icon-right"
                    onButtonClick={() => this.loginUser()}
                    iconClassName="demo-icon icon-arrow-right icon" />

                {/*         <Link to="/register" className="register">Register</Link>
                 </div>
             </div>
            */}
            </div>
        );
    }
}

export default UserLoginComponent;
