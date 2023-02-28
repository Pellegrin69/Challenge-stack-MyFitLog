import Footer from '@/components/surface/footer';
import Header from '@/components/surface/header';
import { Outlet } from 'react-router-dom';

function Root() {
  return (
    <div className="App">
      <Header />
      <Outlet />
      <Footer />
    </div>
  );
}

export default Root;
