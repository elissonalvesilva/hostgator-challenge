import React from 'react';
import ReactDOM from 'react-dom';
import {
  BrowserRouter as Router,
  Route,
} from 'react-router-dom';

import './scss/hostgator.scss';
import App from './App';

ReactDOM.render(
  <Router>
    <Route exact path="/">
      <App />
    </Route>
  </Router>,
  document.getElementById('root'),
);
