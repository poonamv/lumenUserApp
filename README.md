# lumenUserApp
Rest API for users and roles - Lumen
# Resources
The API has been built with two resources 1) Users 2) Roles

* The User contain fields : name, email (unique), address
* The role contain fields : name
* User can have many roles, and a role can be assigned to multiple users - Many to many relationship

# Prerequisite
This Application is built on Lumen 1.0.2, it has a few system requirements.
However, if you are not using Homestead, you will need to make sure your server meets the following requirements:

- PHP >= 7.1.3
- MySql >= 5.7
- Composer
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- JSON PHP Extension

# Installation steps
Follow the bellow steps to install and set up the application.

Step 1: Clone the Application
You can download the ZIP file or git clone from my repo into your project directory.

Step 2: Configure the Application
After you clone the repo in to your project folder the project need to be set up by following commands-

In terminal go to your project directory and Run

* composer install 
 - Edit the .env file and Change the database configurations as per your server configs.
 
* Make your storage and bootstrapp folder writable by your application user.

* Create all the necessary tables need for the application by runing the bellow command.
  - php artisan migrate
  
* Fill default data if your need by running bellow command.
  - php artisan db:seed
  
* **Optional** - Adding more commands to lumen, by default lumen doesnot come with make:model/controller command. Run the below command to add commands to lumen.
  - composer require wn/lumen-generators
  
  This command will update the composer.json file  

* Following command can be used to generate restful resource model, controller, migration, routes for given resoure

  - php artisan wn:resource role "name;string;required;fillable" --add=timestamps

  Generated the **role** resource using above mentioned command.

# API Endpoints and Routes

Below are the all resources API endpoints -

  -  GET    | users

  -  POST   | user

  -  GET    | user/{$id} 

  -  PUT    | user/{$id} 

  -  DELETE | user/{$id}

  -  GET   | roles 

  -  GET   | role/{$id}

# Example of User Post request
   {
	   "name": "Poonam",
	   "email": "poonam@gmail.com",
	   "address": "15 street",
	   "roles": [
	      "admin"			
	   ]
  }
 - Json Response - A user will be created with requested data
# Example of User Put request - url - http://localhost:8000/user/10 
   {
	   "roles": [
	      "user", "author"			
	   ]
  }  
  - Json response - user with id 10 will be updated with the roles
  
# Notes
- Repository pattern is implemented
- Created the Repositroies Folder in App folder
- Added UserRepositoryInterface and UserRepository Class
- Added the bindings of interface and class in Providers/AppServiceProvider.php class
  -  $this->app->bind('App\Repositories\UserRepositoryInterface', 'App\Repositories\UserRepository');




