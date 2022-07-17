# Lancement du projet

## Project sous laravel sail et ViteJS

* Installation des dépendances : 
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
* Pour démarrer le project lancer la commande : `./vendor/bin/sail up -d`
* Pour avoir les assets (styles) lancer la commande `./vendor/bin/sail npm install && ./vendor/bin/sail npm run build`
* Pour avoir les donnés : `./vendor/bin/sail artisan migrate:fresh --seed`
* Se rendre sur la page http://localhost
