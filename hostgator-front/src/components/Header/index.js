import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Grid from '@material-ui/core/Grid';
import DoneIcon from '@material-ui/icons/Done';
import ArrowDropDownIcon from '@material-ui/icons/ArrowDropDown';

import Navigation from '../Navigation';

import cabinetTable from '../../../images/Grupo_29995.svg';
import personAndTable from '../../../images/Grupo_29996.svg';

const useStyles = makeStyles(() => ({
  root: {
    flexGrow: 1,
    display: 'flex',
  },
  section: {
    flexGrow: 1,
    display: 'flex',
    flexDirection: 'column',
  },
}));

function Header() {
  const classes = useStyles();

  return (
    <div className="header">
      <Navigation />

      <div className="header__content">
        <div className={`header__section ${classes.root}`}>
          <Grid container>
            <Grid item xs>
              <img
                src={cabinetTable}
                alt="cabinet and table"
                className="header__cabinet--image"
              />
            </Grid>
          </Grid>
          <Grid container>
            <Grid item xs>
              <div className={`header__description ${classes.description}`}>
                <Grid item xs>
                  <h6 className="description__title">
                    Hospedagem de Sites
                  </h6>
                </Grid>
                <Grid item xs>
                  <h2 className="description__text">
                    Tenha uma hospedagem de sites
                    estável e evite perder visitantes diariamente
                  </h2>
                </Grid>
                <Grid item xs>
                  <div className="description__offers">
                    <h6>
                      <DoneIcon />
                      <span>
                        99,9% de disponibilidade: seu site sempre no ar
                      </span>
                    </h6>
                    <h6>
                      <DoneIcon />
                      <span>
                        Suporte 24h, todos os dias
                      </span>

                      <DoneIcon />
                      <span>
                        Painel de Controle cPanel
                      </span>
                    </h6>
                  </div>
                </Grid>
              </div>
            </Grid>
          </Grid>
          <Grid container>
            <Grid item xs>
              <img
                src={personAndTable}
                alt="cabinet and table"
                className="header__person--image"
              />
            </Grid>
          </Grid>
        </div>
        <div className="header__arrow">
          <div className="arrow__down">
            <ArrowDropDownIcon className="arrow__icon" />
          </div>
        </div>
      </div>
    </div>
  );
}

export default Header;
