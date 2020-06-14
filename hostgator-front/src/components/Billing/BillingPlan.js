import React from 'react';
import {
  Card,
} from '@material-ui/core';

import PrincePlan from './PricePlan';
import DetailsPlan from './DetailsPlan';

import planIcon from '../../../images/Grupo_29910.svg';

function BillingPlan() {
  return (
    <div className="billing-plan">
      <div className="billing-plan__background">
        <Card className="billing-plan__card">
          <div className="billing-card__header">
            <img src={planIcon} alt="plan icon" />
            <h2>Plano M</h2>
          </div>
          <hr className="divider" />
          <PrincePlan />
          <hr className="divider" />
          <DetailsPlan />
        </Card>
      </div>
    </div>
  );
}

export default BillingPlan;
