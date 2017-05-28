
import { connect } from 'react-redux';

import * as loginActions from '../actions/loginActions';
import LoginContainer from '../containers/LoginContainer';

const ConnectedLogin = connect(
    (state, ownProps) => {
        const { user } = state;
        return Object.assign({}, ownProps, { user: user });
    }, loginActions,
    (stateProps, dispatchActions) => {
        return Object.assign({}, stateProps, {
            loginUser: (email, pass) => dispatchActions.loginUser(email, pass),
            loginLuser: (email, pass) => dispatchActions.loginLuser(email, pass)
        });
    })(LoginContainer);

export default ConnectedLogin;
