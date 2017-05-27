import React, { Component } from 'react';
import { OAuthSignInButton } from "redux-auth/default-theme";

import autoBind from 'react-autobind';

class LoginPage extends Component {
    constructor(props) {
        super(props);        
        autoBind(this);
    }
    
    loginSucceeded(token, uid, client, expiry) {
        console.log('Login succeeded.')
        console.log(`Token: ${token}; uid: ${uid}; client: ${client}; expiry: ${expiry} `);
    }

    render() {
        return <OAuthSignInButton provider="facebook" endpoint="/" next={this.loginSucceeded} />        
    }
}

export default LoginPage;