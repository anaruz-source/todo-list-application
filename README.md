# Todo List application
## based on  Symfony 4 & 5 Web Development Guide: Beginner To Advanced (Udemy)

## 1. installation

### Symfony installation (version 4.2.*)

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

### if you get 404!

---

do install symfony/apache-pack

```
composer require symfony/apache-pack
```

### Doctrine and Twig templating

```
composer require doctrine
 composer require symfony/twig-pack
composer require twig/twig "3.0.4"
composer require symfony/twig-bridge

```