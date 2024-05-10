---
layout: default
chapitre: MVC
presentation: MVC
package: GestionProjects
presentationPackage: GestionProjects
order:  18
---

# Réalisation
{:class="sectionHeader"}

- Ce chapitre met en valeur les technologies et outils utilisés dans la réalisation du projets **lab Crud**.
-  Il comprend également des captures d'écran de la réalisation du projet.
-  Il permet de présenter les différentes technologies mises en œuvre et de visualiser le résultat obtenu.
{:class="introduction"}

<!-- new slide -->

## MVC
Le Modèle-Vue-Contrôleur (MVC) est un schéma architectural qui sépare une application en trois composants principaux : 
- le modèle, la vue et le contrôleur. 
- Chaque composant répond à des aspects spécifiques du développement. 
- Très utilisé en développement web, le MVC permet de concevoir des projets évolutifs.

**Modèle** :
Gère la logique des données, telles que leur manipulation ou leur affichage. Par exemple, un objet Client peut récupérer des informations de la base de données et les mettre à jour.

**Vue** :
Gère l'interface utilisateur, y compris les champs de texte, menus déroulants, etc., pour une interaction facile.

**Contrôleur** :
Fait le lien entre Modèle et Vue pour traiter la logique métier, les requêtes et la manipulation des données. 
Par exemple, le contrôleur Client gère les interactions et la mise à jour de la base de données, à travers le modèle Client.

{:class="introduction"}

![MVC](/lab_crud/realisation/MVC/images/mvc.png){:width="78%"}*figure: MVC*



<!-- new slide -->