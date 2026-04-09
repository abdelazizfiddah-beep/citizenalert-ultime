# CitizenAlert Ultime

Plateforme signalements citoyens - Symfony 7 + MySQL Docker

## Fonctionnalités actuelles
- Signalement (titre, description, position GPS, type)
- Types: déchet, accident, incivilité, vol, voirie
- Repository personnalisé (liste récente, filtre type)

## Structure DB

## Installation locale
```bash
git clone https://github.com/abdelazizfiddah-beep/citizenalert-ultime.git
cd citizenalert-ultime
docker compose up -d
composer install
cp .env .env.local
php bin/console doctrine:migrations:migrate
symfony serve
```

## Prochaines étapes
- Formulaire création signalement
- Carte interactive Leaflet
- Liste + filtres
