import React from "react"
import * as Styled from "./SecondaryButton.styles"
import { Box } from "@mui/material"

export const SecondaryButton: React.FC<SecondaryButtonProps> = (props) => {
  return (
    <Box>
      <Styled.ButtonComponent
        variant="outlined"
      >
        {props.buttonLabel}
      </Styled.ButtonComponent>
    </Box>
  )
}

export interface SecondaryButtonProps {
  buttonLabel: string
}
