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
        * core_completion_get_course_completion_status
        * core_course_get_courses
        * core_course_get_contents
        * core_course_get_course_module
        * core_course_get_courses
        * core_course_search_courses
        * core_enrol_get_enrolled_users
        * enrol_manual_enrol_users
        * mod_page_get_pages_by_courses
        * mod_book_get_books_by_courses
        * mod_scorm_get_scorms_by_courses
3. Create a token for the admin user (used in the Laravel .env file)
    * Site Administration > Plugins > Web services > Manage tokens
    * Click Add
        * Search for the admin user you want to use
        * Select your Web Service
        * Save changes

## Endpoints

Use the LaraMoodle facade to access the web service data.

```php
use NRBusinessSystems\LaraMoodle\Facade as LaraMoodle;
``` 

The package uses [Spatie Data Transfer Objects](https://github.com/spatie/data-transfer-object) to format the response into objects.

### Get Courses

Returns a collection of courses.

```php
$courses = LaraMoodle::getCourses();

foreach($courses as $course) {
   echo $course->fullname; // My First Course        
}

echo $courses[0]->fullname; // My First Course
```

### Get Course By Id

Once you know the course ID (int) you can get a specific course.

```php
$course = LaraMoodle::getCourseById(2);

echo $course->fullname; // My First Course
```

### Search Courses

Pass in your search term as the first parameter (string). 

```php
$searchResults = LaraMoodle::searchCourses('search term');

echo $searchResults->total; // 1
echo $searchResults->courses[0]->fullname; // My First Course
```

Optionally pass in page number (integer) and per page (integer).

```php
$searchResults = LaraMoodle::searchCourses('search term', 2, 15);
```

### Get Course Contents By Id

Once you know the course Id you can get the contents of a specific course.

```php
$courseContents = LaraMoodle::getCourseContentsById(1);

echo $courseContents[0]->name; // Topic name
echo $courseContents[0]->modules[0]->name; // Activity name
```

### Get Course Module By Id

Once you know the module id from the course contents you can get more details about the module.

```php
$module = LaraMoodle::getCourseModuleById(11);

echo $module->cm->name; // Topic name
```

### Get Course Pages

Once you know the course Id you can get the pages for the course.

```php
$pages = LaraMoodle::getCoursePages(1);

echo $pages->pages[0]->name; // Page name
```

### Search Users

Search for users. Default search field is username if not provided. 

```php
// Defaults to searching by username
$users = LaraMoodle::searchUsers('testuser');

// Override to search by email address
$users = LaraMoodle::searchUsers('test.user@fake.email', 'email');

echo $users->users[0]->fullname; // Test User
```

### Enrol User On A Course

You can enrol a user onto a course by specifying the user id then the course id. By default they have the student role, but you can specify the role id.

There is a `null` response from Moodle when successful, but enrolUserOnCourse returns `true` when successful and MoodleException if it fails.

```php
// Defaults role to student
LaraMoodle::enrolUserOnCourse(2, 2);

// Override role to editing teacher
LaraMoodle::enrolUserOnCourse(2, 2, 3);
```

### Get Enrolled Users For A Course

You can get a collection of users enrolled on a course. These are Moodle users and not Laravel user models.

```php
$enrolledUsers = LaraMoodle::getEnrolledUsersForCourse(2);

echo $enrolledUsers[0]->fullname; // Test User
echo $enrolledUsers[0]->roles[0]->shortname; // Student
```
