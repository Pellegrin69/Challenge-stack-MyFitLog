import React from "react"
import { InputText } from "@/components/Input/InputText/InputText"
import { PrimaryButton } from "@/components/Input/Button/PrimaryButton/PrimaryButton"
import { SecondaryButton } from "@/components/Input/Button/SecondaryButton/SecondaryButton"
import * as Styles from "../LoginForm/LoginForm.styles"

export const SignInForm: React.FC = () => {
  return (
    <Styles.Container>
      <InputText
        labelInput="Firstname"
        placeholder="emmanuel"
      />
      <InputText
        labelInput="Lastname"
        placeholder="Dupont"
      />
      <InputText
        labelInput="Email"
        placeholder="email@gmail.mail"
      />
      <InputText
        labelInput="Password"
        placeholder="email@gmail.mail"
        inputType="password"
      />
      <PrimaryButton
        buttonLabel="Sign in"
      />

      {/** <FormControlLabel control={<Checkbox defaultChecked/>} label="remember me"/> */}
      <SecondaryButton
        buttonLabel="Sign in with Google"
      />
    </Styles.Container>
  )
}
