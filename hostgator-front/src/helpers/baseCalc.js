const calc = {
  calcDiscount(originalValue, discount = 0.4) {
    return originalValue - (originalValue * discount);
  },
  calcCycleInstallments(valueWithDiscount, installments) {
    return valueWithDiscount / installments;
  },
  offer(originalValue, valueWithDiscount) {
    return originalValue - valueWithDiscount;
  },
};

export default calc;
