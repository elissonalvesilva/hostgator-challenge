import React from 'react';
import { Provider } from 'react-redux';

import Header from './components/Header';
import Banner from './components/Banner';
import Billing from './components/Billing';

import store from './redux/store';

function App() {
  return (
    <Provider store={store}>
      <div className="App">
        <Header />
        <main className="hostgator-main">
          <Banner />
          <Billing />
        </main>
      </div>
    </Provider>
  );
}

export default App;
