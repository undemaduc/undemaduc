import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { browserHistory } from 'react-router';

import LoginButtonComponent from '../components/LoginButtonComponent';


class EditProfileComponent extends React.Component {

    render() {
        return (
            <div className="umd-content-container umd-setup-container umd-login-page d-flex flex-column umd-edit-profile">

                <h2>Profile</h2>

                <div className="edit-profile__form-container">

                    <div className="form-group">
                        <input type="text" className="form-control umd-form-control" placeholder="Name" onChange={this.onNameChange}/>
                    </div>

                    <div className="form-group">
                        <input type="email" className="form-control umd-form-control" placeholder="Email" onChange={this.onEmailChange}/>
                    </div>

                    <div className="form-group">
                        <input type="phone" className="form-control umd-form-control" placeholder="Phone number" onChange={this.onPhoneNrChange}/>
                    </div>

                    <LoginButtonComponent iconClassName="demo-icon icon-arrow-right icon"
                                          className="btn btn-primary btn-lg btn-block umd-btn content-action__button--force-bottom umd-btn--icon-right"
                                          buttonLabel="Save"/>

                </div>

            </div>
        );
    }
}

export default EditProfileComponent;
