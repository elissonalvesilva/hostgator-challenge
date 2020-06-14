const cycles = (state = 'triennially', action) => {
  switch (action.type) {
  case 'SET_CYCLE':
    return { ...state, activeCycle: action.payload };
  case 'GET_CYCLE':
    return state.activeCycle || state;
  default:
    return state;
  }
};

export default cycles;
