import React from 'react';

class WelcomePage extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            userLoginType : 'user'
        }
    }

    switchLoginType () {

        this.setState({
            userLoginType : 'offering'
        });

        console.log(this.state.userLoginType);

    }

    render () {

        return (
            <div className="umd-content-container umd-setup-container umd-login-page">

                <h1 className="setup__title">I'm</h1>

                <div className="dropdown umd-dropdown">
                    <button className="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        looking for
                    </button>
                    <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a className="dropdown-item" data-login-type="location-user" onClick={this.switchLoginType} href="#">offering</a>
                    </div>
                </div>

                <h1 className="setup__title">a place.</h1>

                <button type="button" className="btn btn-primary btn-lg btn-block umd-btn umd-btn--facebook content-action__button--force-bottom umd-btn--icon-right">Login with Facebook <i className="demo-icon icon-arrow-right icon"></i></button>

            </div>
        );

    }

}

export default WelcomePage;
