## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `docker compose build --no-cache` to build fresh images
3. Run `docker compose up --pull --wait` to start the project
4. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
5. Run `docker compose down --remove-orphans` to stop the Docker containers.



## 
SPAJANJE U PHP CONTAINER U DOCKER:
./connect 
ili
docker container exec -ti foi-php-1 sh

KREIRANJE I UPDATE ENTITY-a:
php bin console make:entity

OBAVEZNO NAKON DODAVANJA NOVOG FIELDA NA ENTITY:
php bin console doctrine:migrations:diff
php bin console doctrine:migrations:migrate
