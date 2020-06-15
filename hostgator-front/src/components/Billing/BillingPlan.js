import React, { useEffect } from 'react';
import PropTypes from 'prop-types';
import {
  Card,
} from '@material-ui/core';
import { useSelector, useDispatch } from 'react-redux';

import PrincePlan from './PricePlan';
import DetailsPlan from './DetailsPlan';

import planIcon from '../../../images/Grupo_29910.svg';

function BillingPlan({ values }) {
  const {
    id,
    name,
    cycles: allCycles,
  } = values;

  const cycles = useSelector((state) => state.cycles);
  const dispatch = useDispatch();

  function getCycle() {
    dispatch({ type: 'GET_CYCLE' });
  }

  useEffect(() => {
    getCycle();
  });

  return (
    <div className="billing-plan">
      <div className="billing-plan__background">
        <Card className="billing-plan__card">
          <div className="billing-card__header">
            <img src={planIcon} alt="plan icon" />
            <h2>{ name }</h2>
          </div>
          <hr className="divider" />
          <PrincePlan cycles={allCycles} pid={id} type={cycles} />
          <hr className="divider" />
          <DetailsPlan />
        </Card>
      </div>
    </div>
  );
}

// default Proptypes
BillingPlan.defaultProps = {
  values: PropTypes.shape({
    id: PropTypes.number.isRequired,
    name: PropTypes.string.isRequired,
    cycles: PropTypes.array,
  }),
};

// Proptypes schema
BillingPlan.propTypes = {
  values: PropTypes.shape({
    id: PropTypes.number.isRequired,
    name: PropTypes.string.isRequired,
    cycles: PropTypes.array,
  }),
};

export default BillingPlan;
