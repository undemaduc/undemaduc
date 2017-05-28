import React, { Component } from 'react';
import autoBind from 'react-autobind';
import PropTypes from 'prop-types';
import { browserHistory } from 'react-router';

import LoginButtonComponent from '../components/LoginButtonComponent';


class RegisterContainer extends Component {
    constructor(props) {
        super(props);
        autoBind(this);

        this.state = {
            name: '',
            photo: '',
            email: '',
            phoneNumber: 0
        };
    }

    registerUser() {
        const { name, photo, email, phoneNumber } = this.state;

        if (name && email && phoneNumber) {
            browserHistory.push('events');
        } else {
            // alert('Field missing.');
        }


    }

    onNameChange(e) {
        const name = e.target.value;
        this.setState({ name });
    }

    onEmailChange(e) {
        const email = e.target.value;
        this.setState({ email });
    }

    onPhoneNrChange(e) {
        const phoneNumber = e.target.value;
        this.setState({ phoneNumber });
    }

    render() {
        return (
            <div className="umd-content-container umd-setup-container umd-login-page d-flex flex-column umd-register">

                <div className="setup-info-container">

                    <h1>Welcome!</h1>
                    <h4>Let's set up your profile...</h4>

                </div>

                <div className="umd-register__form-container">

                    <div className="form-group">
                        <input type="text" className="form-control umd-form-control" placeholder="Name" onChange={this.onNameChange}/>
                    </div>

                    {/*<div className="form-group">*/}
                        {/*<input type="text" className="form-control umd-form-control" placeholder="Photo"/>*/}
                    {/*</div>*/}

                    <div className="form-group">
                        <input type="email" className="form-control umd-form-control" placeholder="Email" onChange={this.onEmailChange}/>
                    </div>

                    <div className="form-group">
                        <input type="phone" className="form-control umd-form-control" placeholder="Phone number" onChange={this.onPhoneNrChange}/>
                    </div>

                    <LoginButtonComponent iconClassName="demo-icon icon-arrow-right icon"
                                          className="btn btn-primary btn-lg btn-block umd-btn content-action__button--force-bottom umd-btn--icon-right"
                                          buttonLabel="Save and go to Events"
                                          onButtonClick={() => this.registerUser()} />

                </div>

            </div>
        );
    }
}

RegisterContainer.propTypes = {
    registerUser: PropTypes.func.isRequired
};

export default RegisterContainer;
