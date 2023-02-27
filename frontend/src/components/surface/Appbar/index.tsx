import { Brand } from '@/components/data_display/brand';
import { Logo } from '@/components/data_display/logo';
import { Button, Typography } from '@mui/material';
import * as Styles from './index.styles';

function AppBar() {
  return (
    <Styles.Container>
      <Button onClick={() => {}}>
        <Logo />
      </Button>
      <Brand />
      <Button variant="outlined">Essayer gratuitement</Button>
    </Styles.Container>
  );
}

export default AppBar;
