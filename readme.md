#LaraMoodle

A Laravel package to authenticate with Moodle and retrieve course information.

## Installation

```bash
composer require nrbusinesssystems/laramoodle
```

The package should auto register the service providers. 

### Migrations

The package includes a migration to make the password column nullable and adds a username field to the users table. 

```bash
php artisan migrate
```

### Configuration

Optionally, publish the config file. This is required if you want to customise which fields are synchronised from Moodle to your user model.

```bash
php artisan vendor:publish
```

Update your auth.php config file, providers > users > drivers to `moodle`

Update the .env file with the `MOODLE_BASE_URL` with the url of your Moodle installation and `MOODLE_ADMIN_TOKEN` with a token for an existing user that has permission to search existing users. 

### Credentials

The package expects the credentials from the LoginController to be an array containing `username` and `password`, but if you want to use `username` instead then add `MOODLE_LOGIN_ATTRIBUTE=username` to your .env file.

## Moodle Configuration

In order to access data from Moodle, it needs to be configured first as the web service features are disabled by default. 

1. Create new webservice
    * Site Administration > Plugins > Web services > External Services
    * Add Custom Service or use an existing custom service
        * Name: Web Service
        * Short name: web_service
        * Enabled: true
        * Authorised users only: false
        * Can download files: true
        * Save changes
2. Enable the following functions in the new Moodle web service
    * Site Administration > Plugins > Web services > External Services
    * On the newly created Web Service, click functions and add the following
        * core_user_get_users
        * core_course_get_courses
        * core_course_get_contents
        * core_course_get_course_module
        * core_course_get_courses
        * mod_page_get_pages_by_courses
        * mod_book_get_books_by_courses
        * mod_scorm_get_scorms_by_courses
3. Create a token for the admin user (used in the Laravel .env file)
    * Site Administration > Plugins > Web services > Manage tokens
    * Click Add
        * Search for the admin user you want to use
        * Select your Web Service
        * Save changes
