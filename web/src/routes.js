import React from 'react';
import { Route, IndexRoute, IndexRedirect } from 'react-router';

import AppComponent from './components/AppComponent';
import ConnectedLogin from './connected/ConnectedLogin';

import UserLoginComponent from './components/UserLoginComponent';
import LuserLoginComponent from './components/LuserLoginComponent';
import EventsComponent from './components/EventsComponent';

export default (
	<Route path="/" component={AppComponent}>
		<IndexRedirect to="/login/user" />
		<Route path="/login" component={ConnectedLogin} >
			<Route path="user" component={UserLoginComponent} />
			<Route path="luser" component={LuserLoginComponent} />
		</Route>
		<Route path="events" component={EventsComponent} />
	</Route>
);
