import React from 'react';
import { Route, IndexRoute } from 'react-router';

import AppComponent from './components/AppComponent';
import ConnectedLogin from './connected/ConnectedLogin';

import UserLoginComponent from './components/UserLoginComponent';
import LuserLoginComponent from './components/LuserLoginComponent';

export default (
	<Route path="/" component={AppComponent}>
		<IndexRoute component={ConnectedLogin} />
		<Route path="/login" component={ConnectedLogin} >
			<Route path="user" component={UserLoginComponent} />
			<Route path="luser" component={LuserLoginComponent} />
		</Route>
	</Route>
);
