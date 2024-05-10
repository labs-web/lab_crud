---
layout: default
package: GestionProjects
presentationPackage: GestionProjects
presentation: GestionProjects
order: 19
---

## Business exceptions 

- Afin de résoudre un problème récurrent dans la gestion des erreurs de notre application, nous avons créé une classe d'exception générique appelée 'BusinessException'.
-  Avant cela, notre gestion des erreurs impliquait la manipulation d'exceptions spécifiques pour chaque type d'erreur, ce qui rendait notre code complexe et difficile à maintenir.

- En regroupant toutes les exceptions liées à notre logique métier sous cette classe BusinessException, nous avons simplifié notre stratégie de gestion des erreurs.
-  Cela nous permet de distinguer clairement les erreurs métier des erreurs système et de fournir des messages d'erreur adaptés aux utilisateurs et aux développeurs.

- Cette approche a rendu notre code plus robuste, plus facile à comprendre et à maintenir, tout en nous permettant de réagir efficacement aux problèmes rencontrés lors de l'exécution de notre application .
{:class="introduction"}

![MVC](/lab_crud/realisation/BusinessException/images/BusnisseExceptions.jpg){:width="70%"}*figure: Business exceptions*
<!-- new slide -->

