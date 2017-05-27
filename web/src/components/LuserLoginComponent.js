import React, { Component } from 'react';
import PropTypes from 'prop-types';

import LoginButtonComponent from './LoginButtonComponent';

class LuserLoginComponent extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div>
                <LoginButtonComponent buttonLabel="Login" 
                    className="btn btn-primary btn-lg btn-block umd-btn content-action__button--force-bottom umd-btn--icon-right"
                    onButtonClick={this.props.onLoginButtonClick}
                    iconClassName="demo-icon icon-arrow-right icon" />
            </div>
        );
    }
}

LuserLoginComponent.propTypes = {
    onLoginButtonClick: PropTypes.func.isRequired
};

export default LuserLoginComponent;
