FROM node:11

# Update container
RUN apt-get update && apt-get upgrade -y

# Create directory for app to live
WORKDIR /usr/src/app

# Copy package.json
COPY ./server1/package*.json ./

# Install packages
RUN npm install

# Copy files over
COPY ./server1/index.js ./

# Let the port be known
EXPOSE 5000

# Start the application
CMD ["npm", "start"]