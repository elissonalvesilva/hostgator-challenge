import React from 'react';
import PropTypes from 'prop-types';

import {
  Card,
} from '@material-ui/core';

import PrincePlan from './PricePlan';
import DetailsPlan from './DetailsPlan';

import planIcon from '../../../images/Grupo_29910.svg';

function BillingPlan({ values }) {
  const {
    name,
    cycles,
  } = values;

  return (
    <div className="billing-plan">
      <div className="billing-plan__background">
        <Card className="billing-plan__card">
          <div className="billing-card__header">
            <img src={planIcon} alt="plan icon" />
            <h2>{ name }</h2>
          </div>
          <hr className="divider" />
          <PrincePlan cycles={cycles} type="annually" />
          <hr className="divider" />
          <DetailsPlan />
        </Card>
      </div>
    </div>
  );
}

BillingPlan.defaultProps = {
  values: PropTypes.shape({
    id: PropTypes.number.isRequired,
    name: PropTypes.string.isRequired,
    cycles: PropTypes.arrayOf(
      PropTypes.shape({
        type: PropTypes.string.isRequired,
        priceRenew: PropTypes.string.isRequired,
        priceOrder: PropTypes.string.isRequired,
        months: PropTypes.number.isRequired,
      }),
    ),
  }),
};

BillingPlan.propTypes = {
  values: PropTypes.shape({
    id: PropTypes.number.isRequired,
    name: PropTypes.string.isRequired,
    cycles: PropTypes.arrayOf(
      PropTypes.shape({
        type: PropTypes.string.isRequired,
        priceRenew: PropTypes.string.isRequired,
        priceOrder: PropTypes.string.isRequired,
        months: PropTypes.number.isRequired,
      }),
    ),
  }),
};

export default BillingPlan;
