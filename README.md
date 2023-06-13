# Laravel, Inertia, and Vue Chat APP Setup

This guide will walk you through the steps to set my app.

Prerequisites:
- PHP
- Composer
- Node.js
- NPM
- Git

## TODO
1. Add Tests with PEST and Laravel Dusk
2. Add Redis
3. Add Minio
4. Add Laravel Precognition
5. Add GitHub Actions

## Essential Commands
1. Run PEST Tests, PHP CS Fixer and PHP Stand
    > composer quality

2. Run ESLint and Prettier
    > npm run quality

3. Run Soketi Server (requires Docker)
    > npm run soketi:start

4. Run Vite
    > npm run dev

## Installation Steps:

1. Clone the repository:

   > git clone <repository_url>

2. Navigate to the project directory:

   > cd <project_directory>

3. Install the dependencies using Composer:

   > composer install

4. Create a .env file by duplicating the .env.example file:

   > cp .env.example .en

5. Configure your database settings in the .env file.

6. Generate an application key:

   > php artisan key:generate

7. Migrate the database:

   > php artisan migrate:fresh

8. Install the NPM dependencies:

   > npm install

9. Build the frontend assets:

   > npm run dev

10. Run the Websockets server:

    > npm run soketi:start

11. Serve the Laravel application using your preferred method (e.g., Laravel Valet, PHP's built-in server, Laravel Sail, etc.):

    > php artisan serve

12. Ensure that the .env key "APP_URL" is set to the URL of your application.

13. Access the application in your browser and register as a new user.

## Additional Configuration:

- If you encounter any issues or need further configuration, please refer to the official Laravel and Inertia documentation.
