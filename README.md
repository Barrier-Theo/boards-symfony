# boards-symfony

Dans ce projet, on peut naviguer entre les différentes pages grâce à la page index. Pour tous les models, project, developpers, tags, tasks, Steps, les fonctionnalités CRUD sont présentes :

Listage des instances dans une table 
Suppression
Modification 
Ajout


## Prerequisites

You will need the following things properly installed on your computer.

* [Git](https://git-scm.com/)
* [Composer](https://getcomposer.org/)
* Php 7.1 min

## Installation

* `git clone <repository-url>` this repository
* `cd boards-symfony`
* `composer update`
* edit `.env` file and modify `DATABASE_URL` variable
* Run the database creation script (`dataBase/projects.sql`) on your mariaDb / mysql server

## Running / Development

* `php bin/console server:run`
* Visit your app at [http://127.0.0.1:8000](http://127.0.0.1:8000).
# boards-symfony : projet de base pour évaluation symfony
