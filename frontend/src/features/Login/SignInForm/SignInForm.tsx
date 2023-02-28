import React from 'react';
import { PrimaryButton } from '@/components/Input/Button/PrimaryButton/PrimaryButton';
import { SecondaryButton } from '@/components/Input/Button/SecondaryButton/SecondaryButton';
import * as Styles from '../LoginForm/LoginForm.styles';
import { Button, TextField } from '@mui/material';
import { Link } from 'react-router-dom';

export const SignInForm: React.FC = () => {
  return (
    <Styles.Container>
      <TextField label="Firstname" placeholder="emmanuel" />
      <TextField label="Lastname" placeholder="Dupont" />
      <TextField label="Email" placeholder="email@gmail.mail" />
      <TextField
        label="Password"
        placeholder="email@gmail.mail"
        type="password"
      />
      <Button
        component={Link}
        to="/dashboard"
        variant="contained"
        color="primary"
      >
        Sign in
      </Button>
      {/** <FormControlLabel control={<Checkbox defaultChecked/>} label="remember me"/> */}
      <SecondaryButton buttonLabel="Sign in with Google" />
    </Styles.Container>
  );
};
