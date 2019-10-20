# JWSchool

### Description

Application to help some Jehovah's Witnesses to organize the Bible School that happens at midweek meetings.

### Road Map


* [x]  Create Meetings
* [x] Give assignments
* [x] Manage Publishers
* [x] Mail Notifications
* [x] Print Support
* [x] Synchronize meetings with jw.org (beta) using JWGetter
* [ ] Add Cron Job to download midweek meetings every week
* [ ]  Add Pop Up Windows for Notifications

## How to start JWSchool

- Clone this repository
- Install the vendor packages
- ``` php artisan serve ```
- ``` php artisan migrate ```
- Go to http://localhost:8000

## Steps to synchronize with wol.org

- Run ``` php artisan get:midweek {meeting date} {es/en} ```
- This will save into the database the midweek meeting from that week in the language of your choice (Onlye Spanish or English available)
