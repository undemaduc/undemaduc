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
                    className="btn btn-primary btn-lg btn-block umd-btn umd-btn--facebook mt-auto"
                    onButtonClick={this.props.onLoginButtonClick}/>
            </div>
        );
    }
}

LuserLoginComponent.propTypes = {
    onLoginButtonClick: PropTypes.func.isRequired
};

export default LuserLoginComponent;
