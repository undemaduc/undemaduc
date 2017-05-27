
import { connect } from 'react-redux';

import * as registerActions from '../actions/registerActions';
import RegisterContainer from '../containers/RegisterContainer';

const ConnectedRegister = connect(
    (state, ownProps) => {
        
        return Object.assign({}, ownProps);
    }, registerActions,
    (stateProps, dispatchActions) => {
        return Object.assign({}, stateProps, {

        })
    })(RegisterContainer);

export default ConnectedRegister;
