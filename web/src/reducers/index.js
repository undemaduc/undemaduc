import { combineReducers } from 'redux';
import { routerReducer } from 'react-router-redux';

import { user } from './loginReducer';

const rootReducer = combineReducers({
	user: user,
	routing: routerReducer
});

export default rootReducer;
