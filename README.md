# Mutu Bimas

1. copy `system-configuration-example.ini` into `system-configuration.ini`
2. fill the data in `system-configuration.ini`.
3. run composer install.
4. create database
5. change database name in `config/db.php`
6. run `php yii migrate --migrationPath=@yii/rbac/migrations`
7. run `php yii migrate`.
