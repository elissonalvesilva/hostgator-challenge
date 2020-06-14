import React from 'react';
import PropTypes from 'prop-types';

import calc from '../../helpers/baseCalc';

import infoIcon from '../../../images/info.svg';

function PrincePlan({ cycles, type }) {
  const cycle = cycles.filter((o) => o.type === type)[0];
  const discount = calc.calcDiscount(cycle.priceOrder);
  const priceInstallments = calc.calcCycleInstallments(discount, cycle.months);
  const priceOffer = calc.offer(cycle.priceOrder, discount);

  return (
    <div className="billing-plan__section">
      <div className="section-prince">
        <div className="section-price__total">
          <del>
            R$
            { cycle.priceOrder }
          </del>
          <span className="price-total">
            R$
            { discount }
          </span>
          <span className="price-text">equivalente a</span>
          <div className="price-per-month">
            R$
            <span className="price-per-month__price">
              {priceInstallments}
            </span>
            /mês*
          </div>
        </div>
        <div className="section-price__buy">
          <a href="#/" className="btn-buy-now">Contrate Agora</a>
        </div>
        <div className="section-price__description">
          <div className="description-info">
            1 ano de Domínio Grátis
            <img src={infoIcon} alt="information about plan " />
          </div>
          <div className="description-discount">
            <span>economize R$</span>
            <span className="description-discount__price">
              {priceOffer}
            </span>
            <span className="description-discount__percent">40% OFF</span>
          </div>
        </div>
      </div>
    </div>
  );
}

PrincePlan.defaultProps = {
  cycles: PropTypes.arrayOf(
    PropTypes.shape({
      type: PropTypes.string.isRequired,
      priceRenew: PropTypes.string.isRequired,
      priceOrder: PropTypes.string.isRequired,
      months: PropTypes.number.isRequired,
    }),
  ),
  type: PropTypes.string,
};

PrincePlan.propTypes = {
  cycles: PropTypes.arrayOf(
    PropTypes.shape({
      type: PropTypes.string.isRequired,
      priceRenew: PropTypes.string.isRequired,
      priceOrder: PropTypes.string.isRequired,
      months: PropTypes.number.isRequired,
    }),
  ),
  type: PropTypes.string,
};

export default PrincePlan;
