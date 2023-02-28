import { Brand } from '@/components/data_display/brand';
import { Logo } from '@/components/data_display/logo';
import { Info, LockOpen } from '@mui/icons-material';
import {
  Button,
  Drawer,
  List,
  ListItem,
  ListItemButton,
  ListItemIcon,
  ListItemText,
} from '@mui/material';
import { useReducer } from 'react';
import { Link } from 'react-router-dom';
import * as Styles from './index.styles';

function Header() {
  const [drawerIsOpen, toggleDrawer] = useReducer((state) => !state, false);
  return (
    <>
      <Styles.Root as="header" maxWidth="xl">
        <Button onClick={toggleDrawer}>
          <Logo />
        </Button>

        <Styles.BrandContainer>
          <Brand />
        </Styles.BrandContainer>

        <Link to={`/login`}>
          <Button variant="outlined">Essayer gratuitement</Button>
        </Link>
      </Styles.Root>

      <Drawer anchor="bottom" open={drawerIsOpen} onClose={toggleDrawer}>
        <List>
          <Link to={`/about`}>
            <ListItem disablePadding>
              <ListItemButton>
                <ListItemIcon>
                  <Info />
                </ListItemIcon>
                <ListItemText primary="À Propos" />
              </ListItemButton>
            </ListItem>
          </Link>
          <Link to={`/login`}>
            <ListItem disablePadding>
              <ListItemButton>
                <ListItemIcon>
                  <LockOpen />
                </ListItemIcon>
                <ListItemText primary="Login" />
              </ListItemButton>
            </ListItem>
          </Link>
        </List>
      </Drawer>
    </>
  );
}

export default Header;
