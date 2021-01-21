### Instructions pour tester le site

##### ** La premiere fois **
- dans un terminal dans votre dossier projet, executez `composer install` pour installer les dependances du projet
- toujours dans le terminal, executez `docker-compose up -d` pour lancer le container docker en arriere plan
- executez `docker-compose ps` pour verifier l'etat du container docker
- executez `symfony console doctrine:migrations:migrate` pour creer les tables dans la base de donnees du container Docker
- executez `symfony console doctrine:fixtures:load` pour peupler la base de donnees
- executez `symfony serve -d` pour lancer le server web fourni par symfony en arriere plan
- enfin, executez `symfony open:local` pour aller sur le site :)

##### ** A chaque fois **
Quand vous lancez votre IDE:
- executez `docker-compose up -d` pour lancer le container docker en arriere plan
- executez `docker-compose ps` pour verifier l'etat du container docker
- executez `symfony serve -d` pour lancer le server web fourni par symfony en arriere plan
- enfin, executez `symfony open:local` pour aller sur le site :)
