import { Box } from '@mui/material';
import { Outlet } from 'react-router-dom';
import Header from './header';

function Dashboard() {
  return (
    <Box bgcolor="primary.light">
      <Header />
      <Outlet />
    </Box>
  );
}

export default Dashboard;
