FROM node:12.4.0-alpine

RUN apk add --no-cache yarn

ENV AUTHOR="yuyamita"

WORKDIR /app
