# syntax=docker/dockerfile:1

FROM php:latest

WORKDIR /Front_End

COPY  . .

CMD [ "php", "-S", "0.0.0.0:8000", "/Front_End/router.php"]
