# JWSchool

### Description

Application to help some Jehovah's Witnesses to organize the Bible School that happens at midweek meetings.

### Road Map


* [x]  Create Meetings
* [x] Give assignments
* [x] Manage Publishers
* [x] Mail Notifications
* [x] Print Support
* [X] Export Meetings to PDf
* [x] Synchronize meetings with jw.org (beta) using JWGetter
* [ ] Export many meetings to one pdf.
* [ ] Add Cron Job to download midweek meetings every week
* [ ] Add Pop Up Windows for Notifications

## How to start JWSchool

- Clone this repository
- Install the vendor packages
- ``` php artisan serve ```
- ``` php artisan migrate ```
- Go to http://localhost:8000

## Create the first user account

- ``` php artisan tinker ```

```
$cong = factory('App\Congregation')->create(['name' => 'TODO']);

$role = factory('App\Role')->create(['name' => 'Elder']);

$user = factory('App\User')->create(['name' => 'TODO', 'email' => 'todo@example.com', 'congregation_id' => $cong->id, 'role_id' => $role->id, 'password' => bcrypt('secret')]);
```

Then log in using `todo@example.com` and password `secret`, or whichever settings you used above.

## Steps to synchronize with wol.org

- Run ``` php artisan get:midweek {meeting date} {es/en} ```
- This will save into the database the midweek meeting from that week in the language of your choice (Only Spanish or English available)

## Add Publishers

When adding publishers JW School follows the next structure:

| Type of User               | Notifications | JW School Access |
| :------------------------: | :-----------: | :--------------: |
| User with Password (Admin) | Y             | Y                |
| User with no password      | Y             | N                |
