1. docker build -t app-demo .
2. create .env file from .env.dist (set jwt token and api url)
3. docker run -d --env-file=.env -v $(pwd):/var/www/html -p 80:80 --rm app-demo

Unit tests:
docker run -v $(pwd):/var/www/html --rm app-demo ./vendor/bin/phpunit tests/unit