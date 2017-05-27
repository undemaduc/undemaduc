import React from 'react';
import { Route, IndexRoute } from 'react-router';

import App from './components/App';
import WelcomePage from './components/WelcomePage';
import UserLoginPage from './components/UserLoginPage';
import LocationUserLoginPage from './components/LocationUserLoginPage';
import FuelSavingsPage from './containers/FuelSavingsPage'; // eslint-disable-line import/no-named-as-default
import AboutPage from './components/AboutPage';
import NotFoundPage from './components/NotFoundPage';

export default (
  <Route path="/" component={App}>
    <IndexRoute component={WelcomePage}/>
    <Route path="user-login-page" component={UserLoginPage}/>
    <Route path="location-user-login-page" component={LocationUserLoginPage}/>
    <Route path="fuel-savings" component={FuelSavingsPage}/>
    <Route path="about" component={AboutPage}/>
    <Route path="*" component={NotFoundPage}/>
  </Route>
);
