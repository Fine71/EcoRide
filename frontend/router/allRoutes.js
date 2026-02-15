import Route from "./Route.js";

// Définition des routes de l'application

export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.html", []),
    new Route("/signin", "Connexion", "/pages/connexion.html", []),
    new Route("/contact", "Contact", "/pages/contact.html", []),
    new Route("/services", "Services", "/pages/services.html", []),
];

// affichage du titre comme ceci : Route.title - WebsiteName

export const websiteName = "EcoRide";