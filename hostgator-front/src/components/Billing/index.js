/* eslint-disable react-hooks/exhaustive-deps */
import React, { useEffect } from 'react';
import { useSelector, useDispatch } from 'react-redux';
import axios from 'axios';
import configs from '../../config/default';

import BillingCycle from './BillingCycle';
import BillingPlan from './BillingPlan';

function Billing() {
  const { plans } = useSelector((state) => state.plans);
  const dispatch = useDispatch();

  useEffect(() => {
    const fetchData = async () => {
      const { data } = await axios(
        `${configs.api.host}/api/prices`,
      );
      dispatch({ type: 'FILL_PLANS', payload: data.shared });
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
