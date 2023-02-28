import './index.css';
import 'normalize.css';
import { createTheme, ThemeProvider } from '@mui/material';
import React from 'react';
import ReactDOM from 'react-dom/client';
import { createBrowserRouter, RouterProvider } from 'react-router-dom';
import About from './pages/Root/About';
import Root from './pages/Root';
import Login from './pages/Root/Login/Login';
import Home from './pages/Root/Home';
import Dashboard from './pages/Dashboard';
import Analytics from './pages/Dashboard/Analytics';

const router = createBrowserRouter([
  {
    path: '/',
    element: <Root />,
    children: [
      {
        path: '',
        element: <Home />,
      },
      {
        path: 'login',
        element: <Login />,
      },
      {
        path: 'about',
        element: <About />,
      },
    ],
  },
  {
    path: '/dashboard',
    element: <Dashboard />,
    children: [
      {
        path: '',
        element: <Analytics />,
      },
    ],
  },
]);

const theme = createTheme({
  palette: {
    primary: {
      light: '#FDF4EB',
      main: '#D99E63',
      dark: '#d38e4a',
      contrastText: '#FFFFFF',
    },
    text: {
      primary: '#000000',
      secondary: '#D99E63',
    },
  },
  typography: {
    fontFamily: 'Nunito',
  },
});
ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
  <React.StrictMode>
    <ThemeProvider theme={theme}>
      <RouterProvider router={router} />
    </ThemeProvider>
  </React.StrictMode>
);
