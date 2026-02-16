import Route from "./route.js";

// Définition des routes de l'application

export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.html", []),
    new Route("/covoiturage", "Covoiturage", "/pages/covoiturage.html", []),
    new Route("/signin", "Connexion", "/pages/auth/signin.html", ["disconnected"]),
    new Route("/signup", "Inscription", "/pages/auth/signup.html", ["disconnected"]),
    new Route("/contact", "Contact", "/pages/contact.html", []),
    new Route("/services", "Services", "/pages/services.html", []),
];

// affichage du titre comme ceci : Route.title - WebsiteName

export const websiteName = "EcoRide";