# WordPress Docker Setup

This setup uses Docker Compose to run WordPress with a MySQL database.

## Usage

1. Make sure you have [Docker](https://docs.docker.com/get-docker/) and [Docker Compose](https://docs.docker.com/compose/install/) installed.
2. In the project directory, run:

   ```bash
   docker-compose up -d
   ```

3. Open your browser and go to [http://localhost:8080](http://localhost:8080) to complete the WordPress installation.

## Services
- **wordpress**: Runs the latest WordPress.
- **db**: Runs MySQL 5.7 for WordPress.

## Data Persistence
- WordPress files: `wordpress_data` Docker volume
- MySQL data: `db_data` Docker volume

## Stopping the Services
To stop and remove the containers, run:

```bash
docker-compose down
``` 