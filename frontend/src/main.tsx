import './index.css';
import 'normalize.css';
import { ThemeProvider } from '@emotion/react';
import { createTheme } from '@mui/material';
import React from 'react';
import ReactDOM from 'react-dom/client';
import { createBrowserRouter, RouterProvider } from 'react-router-dom';
import About from './routes/About';
import Root from './routes/Root';
import Home from './routes/Home';

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
        path: 'about',
        element: <About />,
      },
    ],
  },
  {
    path: '/dashboard',
    element: <About />,
    children: [],
  },
]);

const theme = createTheme({
  palette: {
    primary: {
      light: '#FDF4EB',
      main: '#d67c6a',
    },
    text: {
      primary: '#000000',
      secondary: '#d67c6a',
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
