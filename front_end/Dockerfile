# syntax=docker/dockerfile:1

FROM php:latest

WORKDIR /front_end

COPY  . .

CMD [ "php", "-S", "0.0.0.0:8000", "front_end/router.php"]
