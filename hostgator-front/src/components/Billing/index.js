import React from 'react';
import BillingCycle from './BillingCycle';
import BillingPlan from './BillingPlan';

function Billing() {
  return (
    <div className="billing" id="billing">
      <BillingCycle />
      <BillingPlan />
    </div>
  );
}

export default Billing;
