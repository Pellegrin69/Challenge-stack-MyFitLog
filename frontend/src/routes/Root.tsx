import AppBar from '@/components/surface/Appbar';
import { Outlet } from 'react-router-dom';

function Root() {
  return (
    <div className="App">
      <AppBar />
      <Outlet />
    </div>
  );
}

export default Root;
