---
layout: default
package: GestionProjects
presentationPackage: GestionProjects
presentation: GestionProjects
order: 5
---

# Analyse Techniques
{:class="sectionHeader"}

L'analyse technique est essentielle pour identifier les besoins non fonctionnels, qui englobent les contraintes d'intégration, de développement et de performances. Ces éléments, comme les exigences liées à la compatibilité avec d'autres systèmes, aux normes de développement et aux objectifs de performance, sont capturés et documentés en amont afin d'orienter efficacement le processus de conception et de développement de l'application.
{:class="introduction"}

<!-- new slide -->

## Capture des besoins techniques

La capture des besoins techniques implique d'identifier et de documenter les exigences précises relatives à l'infrastructure et aux fonctionnalités d'un système. Cette étape essentielle assure la définition claire des paramètres nécessaires à la conception d'une solution logicielle efficace.
{:class="introduction"}


### Les package à utiliser

![Les package utilisé](/lab_crud/Analyse-Techniques/package-utilisé/images/package.jpg){:width="900px"}*figure: Les package utilisé*

<!-- note -->

- Font Awsome Icons:
  - [Documentation : https://github.com/FortAwesome/Font-Awesome#documentation](https://github.com/FortAwesome/Font-Awesome#documentation)
  - **Version:** 6.5.2

- Rich Text Editor ckeditor5:
  - [Documentation : https://www.npmjs.com/package/@ckeditor/ckeditor5-build-classic](https://www.npmjs.com/package/@ckeditor/ckeditor5-build-classic)
  - **Version:** 41.3.1

- jQuery:
  - [Documentation : https://www.npmjs.com/package/jquery](https://www.npmjs.com/package/jquery)
  - **Version:** 3.7.1

- AdminLTE:
  - [Documentation : https://www.npmjs.com/package/admin-lte](https://www.npmjs.com/package/admin-lte)
  - **Version:** 3.1

- Laravel UI:
  - [Documentation : https://laravel.com/docs/7.x/authentication](https://laravel.com/docs/7.x/authentication)
  - **Version:** 2.4

- Spatie:
  - [Documentation : https://spatie.be/docs/laravel-permission/v6/installation-laravel](https://spatie.be/docs/laravel-permission/v6/installation-laravel)
  - **Version:** 6.0

- Laravel Excel:
  - [Documentation : https://docs.laravel-excel.com/3.1/getting-started/](https://docs.laravel-excel.com/3.1/getting-started/)
  - **Version:** 3.1

<!-- new slide -->

### Gestion des exceptions 

![Gestion des exceptions](/lab_crud/Analyse-Techniques/package-utilisé/images/exceptions.jpg){:width="900px"}*figure:Gestion des exceptions*

<!-- note -->
- Nous avons adopté une approche de gestion des exceptions afin de traiter les erreurs de manière efficace et efficiente.
  
-  Cette décision découle de la nécessité de gérer les situations anormales qui peuvent survenir lors de l'exécution de notre application, telles que des entrées utilisateur incorrectes, des erreurs de connexion, ou d'autres scénarios imprévus.

- Nous avions envisagé d'utiliser des exceptions spécifiques pour chaque type d'erreur, mais nous avons rapidement réalisé que cette approche pouvait alourdir notre code et le rendre moins lisible.
  
-  En effet, la multiplication des blocs "try-catch" pour gérer chaque exception individuellement aurait rendu notre code complexe et difficile à maintenir.
  
<!-- new slide -->