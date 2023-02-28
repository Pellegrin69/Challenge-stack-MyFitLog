import React from "react"
import { InputText } from "@/components/Input/InputText/InputText"
import { PrimaryButton } from "@/components/Input/Button/PrimaryButton/PrimaryButton"
import { SecondaryButton } from "@/components/Input/Button/SecondaryButton/SecondaryButton"
import * as Styles from "./LoginForm.styles"

export const LoginForm: React.FC = () => {
  return (
    <Styles.Container>
      <InputText
        labelInput="email"
        placeholder="emm@gmail.com"
      />
      <InputText
        labelInput="password"
        placeholder="emm@gmail.com"
        inputType="password"
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
