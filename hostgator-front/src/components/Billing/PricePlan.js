import React from 'react';
import infoIcon from '../../../images/info.svg';

function PrincePlan() {
  return (
    <div className="billing-plan__section">
      <div className="section-prince">
        <div className="section-price__total">
          <del> R$ 647,64 </del>
          <span className="price-total">R$ 453,35</span>
          <span className="price-text">equivalente a</span>
          <div className="price-per-month">
            R$
            <span className="price-per-month__price"> 12,59</span>
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
            <span className="description-discount__price">174,88</span>
            <span className="description-discount__percent">40% OFF</span>
          </div>
        </div>
      </div>
    </div>
  );
}

export default PrincePlan;
