FROM node:14

WORKDIR /shinago

COPY ../../package*.json ../

RUN npm install

COPY ../../ .

CMD ["npm", "dev"]
