
import { connect } from 'react-redux';

import * as loginActions from '../actions/loginActions';
import LoginContainer from '../containers/LoginContainer';

const ConnectedLogin = connect(
    (state, ownProps) => {
        
        return Object.assign({}, ownProps);
    }, loginActions,
    (stateProps, dispatchActions) => {
        return Object.assign({}, stateProps, {

        })
    })(LoginContainer);

export default ConnectedLogin;
