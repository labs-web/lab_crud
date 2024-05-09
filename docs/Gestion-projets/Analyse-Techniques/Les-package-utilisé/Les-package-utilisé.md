---
layout: default
package: GestionProjects
presentationPackage: GestionProjects
presentation: GestionProjects
order: 5
---
# Analyse Techniques

<!-- new slide -->

## Capturer les besoins techniques

### Les package utilisé

![Les package utilisé](/lab_crud/Gestion-projets/Analyse-Techniques/Les-package-utilisé/images/1_n2YyXncCgoWgemC6xjZG4w.jpg){:width="900px"}*figure: Les package utilisé*

<!-- note -->

- Font Awsome Icons:
  - [Documentation : https://www.npmjs.com/package/@fortawesome/fontawesome-free](https://www.npmjs.com/package/@fortawesome/fontawesome-free)
  - **Commande:** *npm i @fortawesome/fontawesome-free*
  - **Version:** 6.5.2

- Rich Text Editor:
  - [Documentation : https://www.npmjs.com/package/@ckeditor/ckeditor5-build-classic](https://www.npmjs.com/package/@ckeditor/ckeditor5-build-classic)
  - **Commande:** *npm i @ckeditor/ckeditor5-build-classic*
  - **Version:** 41.3.1

- jQuery:
  - [Documentation : https://www.npmjs.com/package/jquery](https://www.npmjs.com/package/jquery)
  - **Commande:** *npm i jquery*
  - **Version:** 3.7.1

- AdminLTE:
  - [Documentation : https://www.npmjs.com/package/admin-lte](https://www.npmjs.com/package/admin-lte)
  - **Commande:** *npm install admin-lte@^3.1 --save*
  - **Version:** 3.1

- Laravel UI:
  - [Documentation : https://laravel.com/docs/7.x/authentication](https://laravel.com/docs/7.x/authentication)
  - **Commande:** *composer require laravel/ui:^2.4*
  - **Version:** 2.4

- Spatie:
  - [Documentation : https://spatie.be/docs/laravel-permission/v6/installation-laravel](https://spatie.be/docs/laravel-permission/v6/installation-laravel)
  - **Commande:** *composer require spatie/laravel-permission*
  - **Version:** 6.0

- Laravel Excel:
  - [Documentation : https://docs.laravel-excel.com/3.1/getting-started/](https://docs.laravel-excel.com/3.1/getting-started/)
  - **Commande:** *composer require maatwebsite/excel:^3.1*
  - **Version:** 3.1

<!-- new slide -->

### Gestion des exceptions 

- Nous avons adopté une approche de gestion des exceptions afin de traiter les erreurs de manière efficace et efficiente.
-  Cette décision découle de la nécessité de gérer les situations anormales qui peuvent survenir lors de l'exécution de notre application, telles que des entrées utilisateur incorrectes, des erreurs de connexion, ou d'autres scénarios imprévus.

- Nous avions envisagé d'utiliser des exceptions spécifiques pour chaque type d'erreur, mais nous avons rapidement réalisé que cette approche pouvait alourdir notre code et le rendre moins lisible.
-  En effet, la multiplication des blocs "try-catch" pour gérer chaque exception individuellement aurait rendu notre code complexe et difficile à maintenir.
  