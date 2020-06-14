const calc = {
  /**
   * calculate a discount
   * @param Double originalValue - original value
   * @param Double discount - discount
   * @returns Double discount result
   */
  calcDiscount(originalValue, discount = 0.4) {
    return originalValue - (originalValue * discount);
  },

  /**
   * calculate installments by cycle
   * @param Double valueWithDiscount - value with discount
   * @param Double installments - installments
   * @returns Double total installments value
   */
  calcCycleInstallments(valueWithDiscount, installments) {
    return valueWithDiscount / installments;
  },

  /**
   * calculate offer
   * @param Double originalValue - original value
   * @param Double valueWithDiscount - value without discount
   * @returns offer
   */
  offer(originalValue, valueWithDiscount) {
    return originalValue - valueWithDiscount;
  },
};

export default calc;
