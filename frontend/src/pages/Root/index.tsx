import Footer from './footer';
import Header from './header';
import { Box } from '@mui/material';
import { Outlet } from 'react-router-dom';

function Root() {
  return (
    <div className="App">
      <Header />
      <Box sx={{ m: 10 }} />
      <Outlet />
      <Box sx={{ m: 10 }} />
      <Footer />
    </div>
  );
}

export default Root;
