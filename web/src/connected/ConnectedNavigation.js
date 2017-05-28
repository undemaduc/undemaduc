
import { connect } from 'react-redux';

import * as appActions from '../actions/appActions';
import NavigationComponent from '../components/NavigationComponent';

const ConnectedNavigation = connect(
    (state, ownProps) => {
        const { user } = state;
        return Object.assign({}, ownProps, { user: user });
    }, appActions)(NavigationComponent);

export default ConnectedNavigation;
