# Todo List application
## based on  Symfony 4 & 5 Web Development Guide: Beginner To Advanced (Udemy)

## 1. installation

### Symfony installation (version 4.4.*)

---


```
composer create-project symfony/skeleton ./ "4.4.*"
```

### maker and annoations bundle installation

----

```
composer require maker
composer require doctrine/annotations
```

### Create ToDoListController

---
```
bin/console make:controller ToDoListController
```

### if you get 404! (because .htaccess is absent from your application)

---

do install symfony/apache-pack

```
composer require symfony/apache-pack
```

### Doctrine and Twig templating

---

```
composer require doctrine
composer require symfony/twig-pack
composer require twig/twig "3.0.4"
composer require symfony/twig-bridge

```

### Database config and creation

---

#### configuration
Config consists to uncomment a mysql database and provide username, password and DB name! (.env file)

#### Creation

Following will create todo database (configured in .env)
```
bin/console doctrine:database:create
Created database `todo` for connection named default
```

#### if it errors out!

for this error:

```
An exception occurred in driver: could not find driver
```
check what pdo exentesions are installed, in case of error below, the required driver is not installed.
before:
```
#php -m | grep pdo
pdo_sqlite
```
This is the situation after installing required php extension (centos 8 and Rocky linux 8):

```
# dnf install php-pgsql
# dnf install php-mysqlnd

```
After

```
# php -m | grep pdo
pdo_mysql
pdo_pgsql
pdo_sqlite
```

### Making entity Task
```
$ bin/console make:entity

 Class name of the entity to create or update (e.g. GentlePopsicle):
 > Task

 Your entity already exists! So let's add some new fields!

 New property name (press <return> to stop adding fields):
 > title

 Field type (enter ? to see all types) [string]:
 >

 Field length [255]:
 >

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Task.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > status

 Field type (enter ? to see all types) [string]:
 > boolean

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Task.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 >

```
```
Note:
we faced this error while make this project: "Class Doctrine\Persistence\Mapping\Driver\Annotation Driver does not exist"
We deal with it by deleting inflector and persistence as they're deprecated! then deleted composer.lock
we run: composer install, everything worked fine!
this tweak resolved also this error:
[Symfony\Component\Console\Exception\LogicException] An option named "connection" already exists.
```

### Making migrations

---
```
$ bin/console make:migration

```
## Creating Database Table using migration file

---
```
$ bin/console doctrine:migrations:migrate

 WARNING! You are about to execute a migration in database "todo" that could result in schema changes and data loss. Are you sure you wish to continue? (yes/no) [yes]:
 > 
```