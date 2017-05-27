
import React, { Component } from 'react';
import autoBind from 'react-autobind';
import PropTypes from 'prop-types';

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

        if (name && photo && email && phoneNumber) {
            this.props.registerUser();
        } else {
            alert('Field missing.');
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
            <div className="umd-content-container umd-setup-container umd-login-page d-flex flex-column">
                <h1>Welcome!</h1>
                <h5 className="setup__title">Let's set up your profile...</h5>

                <input type="text" placeholder="Name" onChange={this.onNameChange} />
                <input type="text" placeholder="Photo" />
                <input type="email" placeholder="Email address" onChange={this.onEmailChange} />
                <input type="number" placeholder="Phone number" onChange={this.onPhoneNrChange} />

                <LoginButtonComponent iconClassName="demo-icon icon-arrow-right icon"
                    className="btn btn-primary btn-lg btn-block umd-btn content-action__button--force-bottom umd-btn--icon-right"
                    buttonLabel="Save and continue"
                    onButtonClick={() => this.props.registerUser()} />

            </div>
        );
    }
}

RegisterContainer.propTypes = {
    registerUser: PropTypes.func.isRequired
};

export default RegisterContainer;
