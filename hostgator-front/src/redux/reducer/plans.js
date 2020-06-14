const plans = (state = [], action) => {
  switch (action.type) {
  case 'FILL_PLANS':
    return { ...state, plans: action.payload };
  default:
    return state;
  }
};

export default plans;
