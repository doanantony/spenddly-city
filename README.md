## Laravel Application

- Download the project on your local machine and extract it. 
- This project uses multiple environment files.
    - Open Terminal and run following commands 1 by 1.
        cp -av env/${1:-local}.env .env
        cp -av api/env/${1:-local}.env api/.env
- By now you should have 2 new environment files, you can set the values in those env file if needed.
- This project is docker compatible, To run this project on your docker environment.
    - Run **docker-compose up --build -d** on your repository root directory to create docker containers.
    - Make sure all containers are running before continuing.
    - *api/storage* needs to have server ownership.
       - Run **sudo chown -R www-data:www-data /path/to/storage** to change ownership.
    - Run **docker exec -it laravel_scratch_php bash** to run php container 
        - and then you can run following **commands** as per your needs
            - **composer install**
            - **php artisan storage:link**
            - **php artisan migrate**