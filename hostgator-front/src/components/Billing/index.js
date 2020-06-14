/* eslint-disable react-hooks/exhaustive-deps */
import React, { useState, useEffect } from 'react';
import axios from 'axios';

import BillingCycle from './BillingCycle';
import BillingPlan from './BillingPlan';

// import {
//   calcDiscount,
//   calcCycleInstallments,
//   offer,
// } from '../../helpers/baseCalc';

function Billing() {
  const [plans, setPlans] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      const { data } = await axios(
        'http://localhost:3000/api/prices',
      );

      setPlans(data.shared);
    };

    fetchData();
  });

  return (
    <div className="billing" id="billing">
      <BillingCycle />
      {
        plans && plans.map((item) => (
          <BillingPlan values={item} key={item.id} />
        ))
      }
    </div>
  );
}

export default Billing;
