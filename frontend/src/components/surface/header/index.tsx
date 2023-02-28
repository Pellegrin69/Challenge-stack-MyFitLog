import { Brand } from '@/components/data_display/brand';
import { Logo } from '@/components/data_display/logo';
import { Button } from '@mui/material';
import * as Styles from './index.styles';

function Header() {
  return (
    <Styles.Root as="header" maxWidth="xl">
      <Button onClick={() => {}}>
        <Logo />
      </Button>
      
      <Brand />

      <Button variant="outlined">Essayer gratuitement</Button>
    </Styles.Root>
  );
}

export default Header;
