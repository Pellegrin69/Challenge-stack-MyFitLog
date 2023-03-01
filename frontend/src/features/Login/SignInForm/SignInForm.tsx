import React from 'react';
import { PrimaryButton } from '@/components/Input/Button/PrimaryButton/PrimaryButton';
import { SecondaryButton } from '@/components/Input/Button/SecondaryButton/SecondaryButton';
import * as Styles from '../LoginForm/LoginForm.styles';
import { TextField } from '@mui/material';

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
      <PrimaryButton buttonLabel="Sign in" onClick={() => console.log("test")}/>

      {/** <FormControlLabel control={<Checkbox defaultChecked/>} label="remember me"/> */}
      <SecondaryButton buttonLabel="Sign in with Google" />
    </Styles.Container>
  );
};
