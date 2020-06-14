import React from 'react';

import Header from './components/Header';
import Banner from './components/Banner';
import Billing from './components/Billing';

function App() {
  return (
    <div className="App">
      <Header />
      <main className="hostgator-main">
        <Banner />
        <Billing />
      </main>
    </div>
  );
}

export default App;
