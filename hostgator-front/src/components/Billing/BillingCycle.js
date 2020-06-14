import React from 'react';

import Radio from '@material-ui/core/Radio';
import RadioGroup from '@material-ui/core/RadioGroup';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import FormControl from '@material-ui/core/FormControl';
import FormLabel from '@material-ui/core/FormLabel';

function BillingCycle() {
  const [value, setValue] = React.useState('yearly');

  const handleChange = (event) => {
    setValue(event.target.value);
  };

  return (
    <div className="billing__cycle">
      <FormControl component="fieldset">
        <FormLabel component="legend">Quero pagar a cada:</FormLabel>
        <RadioGroup
          aria-label="cycles"
          name="cycles"
          value={value}
          onChange={handleChange}
          className="cycle__choose"
        >
          <FormControlLabel
            value="triennially"
            control={<Radio />}
            label="3 anos"
            className={
              value === 'triennially' ? 'cycle__choose--active' : ''
            }
          />
          <FormControlLabel
            value="yearly"
            control={<Radio />}
            label="1 ano"
            color="default"
            className={
              value === 'yearly' ? 'cycle__choose--active' : ''
            }
          />
          <FormControlLabel
            value="monthly"
            control={<Radio />}
            label="Mensal"
            className={
              value === 'monthly' ? 'cycle__choose--active' : ''
            }
          />
        </RadioGroup>
      </FormControl>
    </div>
  );
}

export default BillingCycle;
