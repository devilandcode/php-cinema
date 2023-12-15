#### Configuration

The application configuration is the responsibility of the files that are located in the config folder.

app.php - application configuration, including the host
database.php - database configuration
auth.php - user authentication configuration

#### Database

To run the application, you need to create a database and import a dump into it, which is located in the database folder.

#### File system

To access the files that are in the storage folder, you need to create a symbolic link to the public/storage folder.

Linux
```
ln -s $PWD/storage $PWD/public/storage
```
Windows
```
mklink /D storage public/storage
```