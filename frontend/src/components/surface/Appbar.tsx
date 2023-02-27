import styled from '@emotion/styled';
import { Button, Typography } from '@mui/material';

function AppBar() {
  return (
    <Root>
      <Button onClick={() => {}}>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
        >
          <path
            fill="currentColor"
            d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z"
          />
        </svg>
      </Button>
      <Typography variant="h1">MyFitLog</Typography>
      <Button variant="outlined">Essayer gratuitement</Button>
    </Root>
  );
}

export default AppBar;

const Root = styled('div')`
  display: flex;
  justify-content: space-between;
`;
