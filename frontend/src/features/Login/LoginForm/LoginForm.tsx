import React from 'react';
import { PrimaryButton } from '@/components/Input/Button/PrimaryButton/PrimaryButton';
import { SecondaryButton } from '@/components/Input/Button/SecondaryButton/SecondaryButton';
import * as Styles from './LoginForm.styles';
import { Button, TextField } from '@mui/material';
import { Link } from 'react-router-dom';

export const LoginForm: React.FC = () => {
  return (
    <Styles.Container>
      <TextField label="email" placeholder="emm@gmail.com" />
      <TextField label="password" placeholder="emm@gmail.com" type="password" />
      <Button component={Link} to="/dashboard" variant="contained" color="primary">
        login
      </Button>

      {/** <FormControlLabel control={<Checkbox defaultChecked/>} label="remember me"/> */}
      <SecondaryButton buttonLabel="Sign in with Google" />
    </Styles.Container>
  );
};
