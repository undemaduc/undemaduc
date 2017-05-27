import React from 'react';
import { Route, IndexRoute } from 'react-router';

import App from './components/App';
import WelcomePage from './components/WelcomePage';

export default (
  <Route path="/" component={App}>
    <IndexRoute component={WelcomePage}/>
  </Route>
);
