# Moodle
### Voici les étapes à suivre pour exécuter votre application localement avec vagrant:
 ### Requirements:
 
-  Docker
-  Docker compose
 ### Installation:
```sh
vagrant up
```
```sh
vagrant ssh
```
```sh
git clone-b https://gitlab.kaisens.fr/acherfi/moodle/-/tree/bugfix/change-docker-web-host
```
```sh
cd moodle
```
```sh
chmod +x ./bin/moodle-docker-compose
```
```sh
chmod +x ./bin/moodle-docker-wait-for-db
```
```sh
chmod +x ./moodle/vendor/bin/behat
```

##### Webserver host
Il faut changer MOODLE_DOCKER_WEB_HOST par l'adresse ip de votre machine.
```sh
nano bin/moodle-docker-compose
```
export MOODLE_DOCKER_WEB_HOST=${MOODLE_DOCKER_WEB_HOST:-addresse ip machine}
```sh
ctrl+s
```
```sh
ctrl+x
```
Lancer le script d'instalation
```sh
sh ./app-setup.sh
```
Lancer le lien (http://votre adresse ip:8801 )
