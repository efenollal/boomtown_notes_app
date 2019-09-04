# boomtown_notes_app
CRUD application built in Laravel and VueJs

## Installation

- On the terminal or cmd, navigate to the location to where the project will reside in and type `git clone https://github.com/efenollal/boomtown_notes_app.git`. 
  - The repository can also be downloaded as a zip file and unzip it to the project location by opening Clone or download dropdown button and select Download ZIP.
- The application can be quickly run by using Laravel's development server. On your terminal/cmd, simply cd to boomtonw_notes root and type `php artisan serve`. Navigate to *localhost:8000/notes* to see the notes list.
- Rename .env.example to .env and change dbengine to sqlite, dbnane to database.sqlite and leave username and password blank.
- Create a new file and name it **database.sqlite** file in database folder.
- Run composer install on your terminal/cmd.
- Run run `npm install` on terminal/cmd after composer is done installing its packages.
- Run `php artisan migrate` so the required tables are generated.
- Finally run `php artisan serve` to start the server.

## Usage

1. First you will be presented with the list of notes already generated. By clicking the `Add note` button, the application will redirect to the form to create a new note. Simply add your note and click the Add note button to save. If need to go back simply click on the `Back to notes` button.

2. On the list of notes page, each note has three options - `View`, `Edit`, `Delete`. Each one will take you to either see the complete note, edit the note or delete it.

## Testing

Unit tests are run in memory. There is a separate sqlite database for testing purposes. If not present create a file and name it `notes_testing.sqlite`. To run tests on your terminal/cmd:
1. Go to the root of the application
2. Type `php artisan config:clear`. This will clear the default database configuration and use the .env.testing variables and phpunit.xml settings.
3. Type `vendor/bin/phpunit --filter <testName>` to run the tests located in *tests/Feature/NoteTest.php*. 



