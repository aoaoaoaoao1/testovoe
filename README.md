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

## Project Structure & Decisions

### 1. Import Plugin & Recipe Theme

The import plugin and the recipe-theme are designed as a single solution for custom content management and import functionality:
- **Plugin Structure**: The plugin is split into logical subfolders (`acf/`, `cpt/`, `import/`) to separate ACF field definitions, custom post types/taxonomies, and import logic. This modularity makes it easy to maintain and extend.
- **Why this structure?**
  - Keeps business logic (import, CPT, ACF) separated for clarity and reusability.
  - Ensures that import logic is decoupled from theme presentation.
- **Recipe Theme**: The theme is focused on presentation and uses assets, templates, and minimal logic. All custom data handling is delegated to the plugin, keeping the theme clean and update-safe.

### 2. Pixel-Perfect Theme

- **Structure**: The theme is organized by assets (images, JS, CSS), templates, and core files (header, footer, functions.php).
- **Why this structure?**
  - Follows WordPress theme conventions for maintainability.
  - Templates are modular, making it easy to update or add landing pages and other layouts.
--- 