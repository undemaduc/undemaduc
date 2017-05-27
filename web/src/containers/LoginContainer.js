import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { browserHistory } from 'react-router';
import autoBind from 'react-autobind';

import Dropdown, {
    DropdownTrigger,
    DropdownContent
} from 'react-simple-dropdown';

class LoginContainer extends Component {
    constructor(props) {
        super(props);
        autoBind(this);

        this.state = {
            loginType: ''
        };
    }

    componentDidMount() {
        this._setLoginTypeFromProps(this.props);
    }

    componentWillReceiveProps(nextProps) {
        this._setLoginTypeFromProps(nextProps);
    }

    _setLoginTypeFromProps(props) {
        const { pathname } = props.location;
        let loginType = '';

        if (pathname === '/login/user') {
            loginType = 'user';
        } else if (pathname === '/login/luser') {
            loginType = 'luser';
        }

        this.setState({ loginType });
    }

    browseToLoginType(loginType) {
        if (loginType && loginType !== this.state.loginType) {
            this.refs.dropdown.hide();
            browserHistory.replace(loginType);
        }
    }

    render() {
        const { loginType } = this.state;
        const dropdownLabel = loginType === 'user' ? 'looking for' : loginType === 'luser' ? 'offering' : '';

        return (
            <div className="umd-content-container umd-setup-container umd-login-page d-flex flex-column">
                <h1 className="setup__title">I'm</h1>

                <Dropdown ref="dropdown">
                    <DropdownTrigger>
                        <h1>{dropdownLabel}</h1>
                    </DropdownTrigger>
                    <DropdownContent>
                        <ul>
                            <li>
                                <h1 onClick={() => this.browseToLoginType("/login/user")}>looking for</h1>
                            </li>
                            <li>
                                <h1 onClick={() => this.browseToLoginType("/login/luser")}>offering</h1>
                            </li>
                        </ul>
                    </DropdownContent>
                </Dropdown>

                <h1 className="setup__title">a place.</h1>

                {this.props.children}
            </div>
        );
    }
}

LoginContainer.propTypes = {
    location: PropTypes.object.isRequired
};

export default LoginContainer;
