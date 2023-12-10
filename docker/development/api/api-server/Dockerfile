FROM nginx:1.25-alpine3.18

COPY ./api-server/configs/conf.d /etc/nginx/conf.d

WORKDIR /app
###RUN addgroup -g 1000 app && adduser -u 1000 -G app -s /bin/sh -D app
###USER app