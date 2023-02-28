import React from "react"
import Box from '@mui/material/Box'
import * as Styled from "./PrimaryButton.styles"

export const PrimaryButton: React.FC<PrimaryButtonProps> = (props) => {
  return (
    <Box>
      <Styled.ButtonComponent
        variant="contained"
      >
        {props.buttonLabel}
      </Styled.ButtonComponent>
    </Box>
  )
}

export interface PrimaryButtonProps {
  buttonLabel: string
}
