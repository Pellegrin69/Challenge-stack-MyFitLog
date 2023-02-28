import { Box } from "@mui/material";
import { Outlet } from "react-router-dom";
import Header from "./header";

function Dashboard() {
  return (
    <>
      <Header />
      <Box sx={{ m: 10 }} />
      <Outlet />
    </>
  );
}

export default Dashboard;
