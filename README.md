# HOW TO CONTRIBUTE

-fork the repository

-clone the repository to your local device

After cloning cd into the folder you cloned into and run ## composer install

this will install all the dependencies

## FILES

|-App   # This contains the core files of the app

  |-Console
  
  |-Events
  
  |-Exceptions
  
  |-Http **This is where will be working on, for this app
  
  |-Jobs
  
  |-Listeners
  
  |-Providers
  
  |- Models **Not a folder but files   
  
|-Bootsrap

|-database  ** where we will be making our databas schemas

|-public

|-resources

|-routes  **Where we will be writing our routes

|-storage

|-tests  **Contain Tests

## composer.json contains the dependencies for the app please don't touch this!!!

## All routes will be in the web.php file inside the routes folder

## controllers and middlewares are in app->Http directory use them their.


## HOW TO RUN APP
-create a new file called .env and copy the content of .env.example into it
- update the content of the new .env file with your database details
-run migration with `sh php artisan migrate
`
### php -S localhost:8000 -t public
