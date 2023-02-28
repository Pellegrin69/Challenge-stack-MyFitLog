import styled from '@emotion/styled';
import { Typography } from '@mui/material';

export const Container = styled.div`
  margin: 2rem;
  display: grid;
  grid-template-columns: 50% 50%;

  img {
    margin-top: 2rem;
  }
`;

export const LogoContainer = styled.div`
  margin: auto;
`;

export const FormContainer = styled.section`
  text-align: center;
  display: grid;
  margin: auto;
  gap: 2rem;
`;

export const SignUpText = styled(Typography)`
  margin-left: 0.3rem;
  color: #d99e63;
  cursor: pointer;
`;
