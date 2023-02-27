import { styled } from '@mui/material/styles';
import { Typography } from '@mui/material';

export const Container = styled(Typography)(
  ({ theme }) => `
  & > span {
    color: ${theme.palette.primary.main};
  }
`
);
