import React from "react"
import * as Styled from "./LoginPage.styles"

import { Typography } from "@mui/material"
import { LoginForm } from "@/features/Login/LoginForm/LoginForm"
import { SignInForm } from "@/features/Login/SignInForm/SignInForm"
function Login() {
  const unDrawnLogin = "src/assets/undraw_login_page.svg"
  const logo = "src/assets/logo.svg"

  const [ isSignInClick, setIsSignInClick ] = React.useState(false)
  console.log(isSignInClick)
  return (
    <Styled.Container>
      <section>
        <img src={unDrawnLogin} alt=""/>
      </section>

      {/** section formulaire */}

      <Styled.FormContainer>
        <Styled.LogoContainer>
          <img src={logo} alt="logo coeur cardio"/>
        </Styled.LogoContainer>

        <Typography variant="h3" gutterBottom>
          Hello Again !
        </Typography>

        <Typography variant="subtitle2" gutterBottom>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos
          blanditiis tenetur
        </Typography>

        {/** debut partie formulaire de connexion */}
        {isSignInClick ? <SignInForm/> : <LoginForm/>}

        {/** fin partie formulaire de connexion */}

        <div>
          <Typography variant="caption">
            { isSignInClick ? "You have already an account ?" : "Don’t have an account yet ?"}
          </Typography>
          {isSignInClick ? (
            <Styled.SignUpText variant="caption" onClick={() => setIsSignInClick(false)}>
            sign up !
          </Styled.SignUpText>
          ) : (
            <Styled.SignUpText variant="caption" onClick={() => setIsSignInClick(true)}>
              sign in !
            </Styled.SignUpText>
          )}
        </div>
      </Styled.FormContainer>

    </Styled.Container>
  )
}

export default Login;