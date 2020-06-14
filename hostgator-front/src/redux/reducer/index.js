import { combineReducers } from 'redux';
import plans from './plans';
import cycles from './cycles';

const rootReducer = combineReducers({
  plans,
  cycles,
});

export default rootReducer;
