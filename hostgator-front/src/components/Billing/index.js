/* eslint-disable react-hooks/exhaustive-deps */
import React, { useEffect } from 'react';
import { useSelector, useDispatch } from 'react-redux';
import { Grid } from '@material-ui/core';
import axios from 'axios';

import configs from '../../config/default';

import BillingCycle from './BillingCycle';
import BillingPlan from './BillingPlan';

function Billing() {
  // use to get state from redux
  const { plans } = useSelector((state) => state.plans);
  const dispatch = useDispatch();

  useEffect(() => {
    // get data from api and add in redux tree
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
      {
        plans && (
          <>
            <BillingCycle />
            <Grid container justify="center">
              {
                plans.map((item) => (
                  <Grid item sm={12} md={12} lg={4} key={item.id}>
                    <BillingPlan values={item} key={item.id} />
                  </Grid>
                ))
              }
            </Grid>
          </>
        )
      }
    </div>
  );
}

export default Billing;
