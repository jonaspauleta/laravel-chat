# Laravel, Inertia, and Vue.js Application Setup

This guide will walk you through the steps to set up a Laravel, Inertia, and Vue.js application.

Prerequisites:
- PHP
- Composer
- Node.js
- NPM
- Laravel (you can install the Laravel Installer globally via Composer)

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
- Feel free to modify the application to suit your specific requirements.
