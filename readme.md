# Development instructions

## Installation

```bash
$ git clone https://github.com/RMPR/mutuelle-enseignants.git

$ cd mutuelle-soft

$ composer install 

```

## Configuration

### Database file
After executing the sql script located in /Model and the script fake-data.bat to generate random data
Create the file db.php in the config directory with the following content

```php
<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=mutuelle',
    'username' => 'root',
    'password' => your_root_password,
    'charset' => 'utf8',
    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
```

### Update yii2-user database schema

```bash
$ php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
```

### Add Yii2 RBAC migrations

```bash
$ php yii migrate/up --migrationPath=@yii/rbac/migrations
```

### Update database file

​	execute the script Model/updateMutuelle.sql

> You may need to do composer update sometimes 
