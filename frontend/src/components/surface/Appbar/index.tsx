import { Logo } from '@/components/data_display/logo';
import { Button, Typography } from '@mui/material';
import * as Styles from './index.styles';

function AppBar() {
  return (
    <Styles.Container>
      <Button onClick={() => {}}>
        <Logo />
      </Button>
      <Typography variant="h1">MyFitLog</Typography>
      <Button variant="outlined">Essayer gratuitement</Button>
    </Styles.Container>
  );
}

export default AppBar;
