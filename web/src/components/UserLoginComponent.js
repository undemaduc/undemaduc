import React, { Component } from 'react';

import LoginButtonComponent from './LoginButtonComponent';

class UserLoginComponent extends Component {
    constructor(props) {
        super(props);
    }

    render() {        
        return (
            <div>
                <LoginButtonComponent buttonLabel="Login with Facebook"
                    className="btn btn-primary btn-lg btn-block umd-btn umd-btn--facebook content-action__button--force-bottom umd-btn--icon-right"
                    onButtonClick={() => this.props.loginUser()}
                    iconClassName="demo-icon icon-arrow-right icon" />
            </div>
        );
    }
}

export default UserLoginComponent;
