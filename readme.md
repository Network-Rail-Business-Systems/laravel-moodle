# LaraMoodle

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

### User Model

When a user logs in for the first time their email, username and id are set from Moodle in the user model. If you want to customise the fields that are synchronised then publish the laramoodle config file and update the sync_attributes array.

Any fields that you synchronise will need to added to the `protected $fillable` array in your User model.

If you want to use a different model to `App\User` then update the `user_model` in the laramoodle config file.

### Credentials

The package expects the credentials from the LoginController to be an array containing `username` and `password`, but if you want to use `username` instead then add `MOODLE_LOGIN_ATTRIBUTE=username` to your .env file.

### Middleware

The package contains a middleware that you can use to check if the user has a moodle token in their session. If they don't it will log the user out from their Laravel session and redirect the user ot the login page.

To use globally list the `NRBusinessSystems\LaraMoodle\Middleware\MoodleToken::class` in the `$middleware` property of `app/Http/Kernel.php`.

To use on specific routes add `'laramoodle' => \NRBusinessSystems\LaraMoodle\Middleware\MoodleToken::class` to the `$routeMiddleware` in `app/Http/Kernel.php` and then add to your route.

```php
Route::get('/', function () {})->middleware('laramoodle');
```

## Moodle Configuration

In order to access data from Moodle, it needs to be configured first as the web service features are disabled by default.

1. Enable Web Services for mobile devices
    - Site Administration > Mobile app > Mobile settings
    - Enable web services for mobile devices - yes
    - Save changes
2. Create new webservice
    - Site Administration > Plugins > Web services > External Services
    - Add Custom Service or use an existing custom service
        - Name: Web Service
        - Short name: web_service
        - Enabled: true
        - Authorised users only: false
        - Can download files: true
        - Save changes
3. Enable the following functions in the new Moodle web service
    - Site Administration > Plugins > Web services > External Services
    - On the newly created Web Service, click functions and add the following
        - core_badges_get_user_badges
        - core_completion_get_activities_completion_status
        - core_completion_get_course_completion_status
        - core_course_get_categories
        - core_course_get_contents
        - core_course_get_course_module
        - core_course_get_courses
        - core_course_search_courses
        - core_enrol_get_enrolled_users
        - core_user_get_users
        - enrol_manual_enrol_users
        - enrol_self_enrol_user
        - mod_assign_get_assignments
        - mod_assign_save_submission
        - mod_page_get_pages_by_courses
        - mod_page_view_page
        - mod_resource_get_resources_by_courses
        - mod_resource_view_resource
        - mod_book_get_books_by_courses
        - mod_scorm_get_scorms_by_courses
4. Create a token for the admin user (used in the Laravel .env file)
    - Site Administration > Plugins > Web services > Manage tokens
    - Click Add
        - Search for the admin user you want to use
        - Select your Web Service
        - Save changes
5. Allow users to create tokens for the new Web Service so they can create a token when they log in
    - Site Administration > Users > Define Roles
    - Edit Authenticated user
    - Capabilities > Create a web service token > Allow
    - Save

## Endpoints

Use the LaraMoodle facade to access the web service data.

```php
use NRBusinessSystems\LaraMoodle\LaraMoodle as LaraMoodle;
```

The package uses [Spatie Data Transfer Objects](https://github.com/spatie/data-transfer-object) to format the response into objects.

### Get Courses

Returns a collection of courses.

```php
$data = LaraMoodle::getCourses();

foreach ($data->courses as $course) {
    echo $course->fullname; // My First Course
}

echo $data->courses[0]->fullname; // My First Course
```

To filter the list of courses pass in the term and the field. you can use id, ids, shortname and category id.

```php
// Get course with id 3
$data = LaraMoodle::getCourses('2', 'id');

// Get courses with ids 2 & 3
$data = LaraMoodle::getCourses('2,3', 'ids');
```

### Get Course By Id

Once you know the course ID (int) you can get a specific course.

```php
$course = LaraMoodle::getCourse(2);

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

You can also limit the search to only enrolled courses by specifying 1 as the 4th parameter.

```php
$searchResults = LaraMoodle::searchCourses('search term', 2, 15, 1);
```

### Get Course Contents By Id

Once you know the course Id you can get the contents of a specific course.

```php
$courseContents = LaraMoodle::getCourseContents(1);

echo $courseContents[0]->name; // Topic name
echo $courseContents[0]->modules[0]->name; // Activity name
```

### Get Course Module By Id

Once you know the module id from the course contents you can get more details about the module.

```php
$module = LaraMoodle::getCourseModule(11);

echo $module->cm->name; // Topic name
```

### Get Course Pages

Once you know the course id you can get the pages for the course.

```php
$pages = LaraMoodle::getCoursePages(1);

echo $pages->pages[0]->name; // Page name
```

### Get Course Page

Get a specific course page by module id.

```php
$page = LaraMoodle::getCoursePage($courseId, $moduleId);
```

### Get Course Scorms

Once you know the course id you can get the scorms for the course.

```php
$scorms = LaraMoodle::getCourseScorms(1);

echo $scorms->scorms[0]->name; // Example scorm
```

### Get Course Scorm

Get a specific course scorm by module id.

```php
$scorm = LaraMoodle::getCourseScorm($courseId, $moduleId);
```

### Get Course Resources

Once you know the course id you can get the resources.

```php
$resources = LaraMoodle::getCourseResources(1);
echo $resources->resources[0]->name;
```

### Get Course Resource

Get a specific course resource by module id.

```php
$resource = LaraMoodle::getCourseResource($courseId, $moduleId);
```

### Get Course Completion

You can get the course completion status by passing in the user id and the course id.

```php
$completion = LaraMoodle::getCourseCompletion(2, 2);
```

### Get Course Activities Completion

You can get details of a course's activities completion by passing in the user id and the course id.

```php
$activities = LaraMoodle::getCourseActivitiesCompletion(2, 2);

echo $activities->statuses[0]->state;
```

### Get Course Assignments

Get the assignments for a specific course by passing in the course id.

```php
$data = LaraMoodle::getCourseAssignments(2);

echo $data->courses[0]->assignments[0]->name;
echo $data->courses[0]->assignments[0]->id;
```

### Get Course Assignment

Get a specific course assignment by the module id.

```php
$assignment = LaraMoodle::getCourseAssignment($courseId, $moduleId);
```

### Save Course Assignment

Submit the online text for a specific assignment. Returns true on success.

```php
$submit = LaraMoodle::saveCourseAssignment($assignmentId, 'The content');

echo $submit; // true
```

If there is an issue submitting then an array of warnings will be returned, with the error details in the item and message.

```php
$submit = LaraMoodle::saveCourseAssignment($assignmentId, '');

echo $submit[0]->item; // Nothing was submitted
echo $submit[0]->message; // Could not save submission
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

The user performing the call must be an Admin or Manager in Moodle or a teacher in the course.

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

### Get Categories

Get all categories.

```php
$categories = LaraMoodle::getCategories();

echo $categories[0]->name; // Category name
```

### Search Categories

Search for categories. Defaults to searching name if second parameter isn't passed. The search term is an exact match only.

```php
$categories = LaraMoodle::searchCategories('Business Briefing System');

echo $categories[0]->name; // Business Briefing System
```

### View Page Event

Trigger the view page event for activity auto completion. Pass in the page id. Returns true if successful and MoodleException if unsuccessful.

```php
$pageViewed = LaraMoodle::viewPageEvent(1);

dd($pageViewed); // true
```

## HasDates Trait

The package has a HasDates trait that can be added to DataTransferObjects to convert the timestamp from Moodle into a Carbon instance to allow easier formatting for presentation.

```php
$data = LaraMoodle::getCourses();

$data->courses[0]->asDate('startdate')->format('d/m/Y');
$data->courses[0]->dates()->startdate->format('d/m/Y');
$data->courses[0]->dates()->enddate->format('d/m/Y');
```
