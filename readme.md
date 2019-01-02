# Development instructions

## Installation

```bash
$ git clone https://github.com/RMPR/mutuelle-enseignants.git

$ cd mutuelle-soft

$ composer install 

```

## Configuration

### Update yii2-user database schema

```bash
$ php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
```

### Add Yii2 RBAC migrations

```bash
$ php yii migrate/up --migrationPath=@yii/rbac/migrations
```

### Update yii2 user extended database schema

```bash 
$ php yii migrate/up --migrationPath=@vendor/cinghie/yii2-user-extended/migrations
```

> You may need to do composer update sometimes 