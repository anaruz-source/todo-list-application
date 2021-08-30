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
