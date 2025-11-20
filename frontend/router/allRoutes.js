import Route from "./route.js";

// Définition des routes de l'application

export const allRoutes = [
    new Route("/", "Accueil", "/frontend/pages/home.html"),
    new Route("/covoiturage", "Covoiturage", "/frontend/pages/covoiturage.html"),
];

// affichage du titre comme ceci : Route.title - WebsiteName

export const websiteName = "EcoRide";