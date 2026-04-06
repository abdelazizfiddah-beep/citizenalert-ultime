# CitizenAlert Ultime

Plateforme signalements citoyens Symfony 7 + MySQL Docker.

## Features
- Entity Signalement (titre, description, lat/lng, type)
- Enum TypeSignalement (dechet, accident, incivilité, vol, voirie)
- Repository custom (findByLatest, findByType)

## Status
✅ Backend complet + DB migrations
⏳ Formulaire création + carte Leaflet

## Local setup
```bash
git clone https://github.com/abdelazizfiddah-beep/citizenalert-ultime.git
cd citizenalert-ultime
docker compose up -d
composer install
cp .env .env.local  
php bin/console doctrine:migrations:migrate
symfony serve
```

## DB
