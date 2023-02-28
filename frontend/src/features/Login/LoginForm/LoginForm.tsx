import React from "react"
import { PrimaryButton } from "@/components/Input/Button/PrimaryButton/PrimaryButton"
import { SecondaryButton } from "@/components/Input/Button/SecondaryButton/SecondaryButton"
import * as Styles from "./LoginForm.styles"
import { TextField } from "@mui/material"

export const LoginForm: React.FC = () => {
  return (
    <Styles.Container>
      <TextField
        label="email"
        placeholder="emm@gmail.com"
      />
      <TextField
        label="password"
        placeholder="emm@gmail.com"
        type="password"
      />
      <PrimaryButton
        buttonLabel="login"
      />

      {/** <FormControlLabel control={<Checkbox defaultChecked/>} label="remember me"/> */}
      <SecondaryButton
        buttonLabel="Sign in with Google"
      />
    </Styles.Container>
  )
}
