const formatter = {
  currency(value) {
    const currencyFormatter = new Intl.NumberFormat([], {
      style: 'currency',
      currency: 'BRL',
    });

    return currencyFormatter.format(value).replace('R$', '');
  },
};

export default formatter;
