import { HomeCardList } from '@/features/datas/cards/home_card_list';
import { Jumbotron } from '@/features/datas/jumbotron';
import { Box, Button, Container, Typography } from '@mui/material';
import { Link } from 'react-router-dom';

function Home() {
  return (
    <>
      <Container maxWidth="xl">
        <Jumbotron />
        <Box sx={{ m: 4 }} />
        <HomeCardList />
      </Container>
      <Box sx={{ m: 16 }} />
      <Container maxWidth="lg">
        <Typography variant="h5" variantMapping={{ h5: 'h2' }} fontWeight="700">
          Bienvenue sur MyFitLog, l'application de surveillance de la santé
        </Typography>
        <Typography variant="body1">
          Nous avons créé cette application pour aider les utilisateurs à suivre
          <br />
          leur santé et leur progression de manière simple et pratique.
        </Typography>
      </Container>
      <Box sx={{ m: 16 }} />

      <Box sx={{ width: 80, margin: '0 auto' }}>
        <img src="src/assets/stepping_up_chart.svg" alt="" />
      </Box>

      <Box sx={{ m: 16 }} />
      <Container maxWidth="lg" sx={{ textAlign: 'center' }}>
        <Typography variant="h5" variantMapping={{ h5: 'h2' }} fontWeight="700">
          Chez MyFitLog, notre équipe est composée de professionnels passionnés
          <br />
          par la santé et la condition physique.
        </Typography>
        <Box sx={{ m: 2 }} />
        <Typography variant="body1">
          Nous sommes une équipe MyFitLog <br />
          passionnée et constituée de professionnels de la santé et de la
          condition physique déterminés à vous aider <br />à atteindre vos
          objectifs de bien-être.
        </Typography>
        <Box sx={{ m: 6 }} />
        <Link to={'/about'}>
          <Button variant="outlined">À Propos</Button>
        </Link>
      </Container>
      <Box sx={{ m: 16 }} />

      <Box sx={{ width: 80, margin: '0 auto' }}>
        <img src="src/assets/pie_chart.svg" alt="" />
      </Box>

      <Box sx={{ m: 16 }} />
      <Container maxWidth="lg">
        <Typography variant="h5" variantMapping={{ h5: 'h2' }} fontWeight="700">
          Améliorez votre santé et votre condition physique <br />
          avec MyFitLog
        </Typography>
        <Box sx={{ m: 2 }} />
        <Typography variant="body1">
          L'inscription à MyFitLog est simple et gratuite, <br />
          alors inscrivez-vous dès aujourd'hui et commencez à améliorer votre
          santé et votre condition physique.
        </Typography>
        <Box sx={{ m: 4 }} />
        <HomeCardList />
        <Box sx={{ m: 6 }} />
        <Link to={'/login'}>
          <Button variant="outlined" size='large'>Rejoins l’avanture !</Button>
        </Link>
      </Container>
    </>
  );
}

export default Home;
