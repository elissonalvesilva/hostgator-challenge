/* eslint-disable jsx-a11y/click-events-have-key-events */
/* eslint-disable jsx-a11y/no-static-element-interactions */
import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Grid from '@material-ui/core/Grid';
import DoneIcon from '@material-ui/icons/Done';
import ArrowDropDownIcon from '@material-ui/icons/ArrowDropDown';

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

function Banner() {
  const classes = useStyles();

  function scrollToBilling() {
    document
      .getElementById('billing')
      .scrollIntoView(
        {
          behavior: 'smooth',
          block: 'center',
        },
      );
  }

  return (
    <section className="banner">
      <div className="banner__content">
        <div className={`banner__section ${classes.root}`}>
          <Grid container className="banner__section--images">
            <Grid item sm={12} md={12}>
              <img
                src={cabinetTable}
                alt="cabinet and table"
                className="banner__cabinet--image"
              />
            </Grid>
          </Grid>
          <Grid container>
            <Grid item sm={12} md={12}>
              <div className={`banner__description ${classes.description}`}>
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
                    </h6>
                    <h6>
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
          <Grid container className="banner__section--images">
            <Grid item sm={12} md={12}>
              <img
                src={personAndTable}
                alt="cabinet and table"
                className="banner__person--image"
              />
            </Grid>
          </Grid>
        </div>
        <div className="banner__arrow">
          <div className="arrow__down" onClick={scrollToBilling}>
            <ArrowDropDownIcon className="arrow__icon" />
          </div>
        </div>
      </div>
    </section>
  );
}

export default Banner;
