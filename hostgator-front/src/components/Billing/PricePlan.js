import React from 'react';
import PropTypes from 'prop-types';
import { useHistory } from 'react-router-dom';

import calc from '../../helpers/baseCalc';
import formatter from '../../utils/strings';

import infoIcon from '../../../images/info.svg';

/**
 * PrincePlan component
 * @param Array cycles - cycles array
 * @param ReduxState type - cycle type
 */
function PrincePlan({ cycles, type, pid }) {
  // add history
  const history = useHistory();
  // get active cycle by props
  const activeCycle = type.activeCycle || type;
  // filter active cycle by type
  const cycle = cycles.filter((o) => o.type === activeCycle)[0];

  /**
   * functions to make calculos
   */
  const discount = calc.calcDiscount(cycle.priceOrder);
  const priceInstallments = calc.calcCycleInstallments(discount, cycle.months);
  const priceOffer = calc.offer(cycle.priceOrder, discount);

  function buyNow() {
    const searchParams = new URLSearchParams();
    searchParams.set('a', 'add');
    searchParams.set('pid', pid);
    searchParams.set('billingcycle', activeCycle);
    searchParams.set('promocode', 'PROMOHG40');

    history.push({
      pathname: '/',
      search: `?${searchParams.toString()}`,
    });
  }

  return (
    <div className="billing-plan__section">
      <div className="section-prince">
        <div className="section-price__total">
          <del>
            R$
            { formatter.currency(cycle.priceOrder) }
          </del>
          <span className="price-total">
            R$
            { formatter.currency(discount) }
          </span>
          <span className="price-text">equivalente a</span>
          <div className="price-per-month">
            R$
            <span className="price-per-month__price">
              { formatter.currency(priceInstallments) }
            </span>
            /mês*
          </div>
        </div>
        <div className="section-price__buy">
          <a href="#/" className="btn-buy-now" onClick={buyNow}>Contrate Agora</a>
        </div>
        <div className="section-price__description">
          <div className="description-info">
            1 ano de Domínio Grátis
            <img src={infoIcon} alt="information about plan " />
          </div>
          <div className="description-discount">
            <span>economize R$</span>
            <span className="description-discount__price">
              { formatter.currency(priceOffer) }
            </span>
            <span className="description-discount__percent">40% OFF</span>
          </div>
        </div>
      </div>
    </div>
  );
}

PrincePlan.defaultProps = {
  pid: PropTypes.number,
  cycles: PropTypes.arrayOf(
    PropTypes.shape({
      type: PropTypes.string.isRequired,
      priceRenew: PropTypes.string.isRequired,
      priceOrder: PropTypes.string.isRequired,
      months: PropTypes.number.isRequired,
    }),
  ),
  type: PropTypes.any,
};

PrincePlan.propTypes = {
  pid: PropTypes.number,
  cycles: PropTypes.arrayOf(
    PropTypes.shape({
      type: PropTypes.string.isRequired,
      priceRenew: PropTypes.string.isRequired,
      priceOrder: PropTypes.string.isRequired,
      months: PropTypes.number.isRequired,
    }),
  ),
  // eslint-disable-next-line react/forbid-prop-types
  type: PropTypes.any,
};

export default PrincePlan;
