import { Container } from "@mui/material";
import { styled } from "@mui/system";

export const Root = styled(Container)`
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  padding: ${({theme}) => `${theme.spacing(2)} ${theme.spacing(4)}`};
  background-color: ${({theme}) => theme.palette.primary.light};
`;
