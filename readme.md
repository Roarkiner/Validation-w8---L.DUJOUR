# Validation W8 Programmation Orientée Objet

J'ai délibérément fait deux fois ```$target->setHealthPoints($this->arrowDamage);``` dans le fonction "shootMultipleShot" afin de d'abord détruire le bouclier magique (s'il est déployé) avec la première flèche puis faire des dégâts avec la deuxième.

J'ai choisi de faire une attaque simple s'il n'y a pas assez de flèches et que $rand est égal à 1 ou 2 ( il devrait charger un tir multiple ) plutôt que de faire une attaque chargée.

J'ai remplacé dans tous les status le nécessitant ```$target->healthPoints``` par ```$target->getHealthPoints()``` puisque la fonction était dans la classe Character sans jamais être utilisée (bien qu'on pourrait presque totalement la supprimer à la place, les fonctions ayant besoin d'elle étant directement dans les classes ayant accès à la variable. Mais bon, au cas où on aurait besoin de récupérer les points de vie directement hors des classes, on sait jamais).
