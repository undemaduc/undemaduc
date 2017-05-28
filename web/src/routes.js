import React from 'react';
import { Route, IndexRedirect } from 'react-router';

import AppComponent from './components/AppComponent';
import ConnectedLogin from './connected/ConnectedLogin';
import ConnectedRegister from './connected/ConnectedRegister';

import UserLoginComponent from './components/UserLoginComponent';
import LuserLoginComponent from './components/LuserLoginComponent';
import EventsComponent from './components/EventsComponent';
import EditProfileComponent from './components/EditProfileComponent';

export default (
	<Route path="/" component={AppComponent}>
		<IndexRedirect to="/login/user" />
		
		<Route path="/register" component={ConnectedRegister} />
		<Route path="/login" component={ConnectedLogin} >
			<Route path="user" component={UserLoginComponent} />
			<Route path="luser" component={LuserLoginComponent} />
		</Route>
		<Route path="events" component={EventsComponent} />
		<Route path="my-profile" component={EditProfileComponent} />
	</Route>
);
