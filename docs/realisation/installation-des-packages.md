# Installation des packages

1. **Adminlte 3.1**
   - Installation du package 
   ```js
   npm install admin-lte@^3.1 --save
   ```
   - Livrable :
   ```bash
   [Documentation AdminLTE 3.2](https://adminlte.io/docs/3.2/)
   ```

2. **Laravel/ui**
   - Installation du package 
   ```php
   composer require laravel/ui
   ```
   - Livrable :
   ```bash
   [Tutorial d authentification avec Laravel UI](https://medium.com/@online-web-tutor/laravel-10-authentication-with-laravel-ui-tutorial-ce163cce0af7)
   ```

3. **Lang Localization**
   - Installation du package 
   ```php
   php artisan lang:publish
   ```
   - Allez dans `config/app.php`, changez `'fallback_locale' => 'en'`, en `'fallback_locale' => 'fr'`,
     et `'locale' => 'en'` en `'locale' => 'fr'`,
     et `'fallback_locale' => 'en'`, en `'fallback_locale' => 'fr'`,
     et `'faker_locale' => 'en_EN'`, en `'faker_locale' => 'fr_FR'`,
   - Livrable :
   ```bash
   [Documentation Laravel - Localisation](https://laravel.com/docs/11.x/localization#main-content)
   ```

4. **maatwebsite/excel**
   - Installation du package 
   ```bash
   composer require maatwebsite/excel:^3.1
   ```
   - Ensuite, allez dans `composer.json` et mettez à jour `"maatwebsite/excel": "*"` en `"maatwebsite/excel": "3.1.48"`
   - Exécutez cette commande
   ```bash
   composer update
   ```
   - Exécutez cette commande `php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config`
   - Livrable :
   ```bash
   [Documentation Laravel Excel - Installation](https://docs.laravel-excel.com/3.1/getting-started/installation.html)
   ```

5. **ckeditor5**
   - Installation du package 
   ```bash
   npm install --save @ckeditor/ckeditor5-build-classic
   ```
   - Ajoutez ce JavaScript dans `app.js`
   ```js
   import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

   ClassicEditor
       .create( document.querySelector( '#editor' ) )
       .then( editor => {
           window.editor = editor;
       } )
       .catch( error => {
           console.error( 'Il y a eu un problème lors de l\'initialisation de l\'éditeur.', error );
       } );
   ```
      - Livrable :
   ```bash
   [Documentation Laravel Excel - Installation](https://www.npmjs.com/package/@ckeditor/ckeditor5-build-classic)
   ```

6. **Laravel Spatie**
   - Installation du package 
   ```php
   composer require spatie/laravel-permission
   ```
   - Ajoutez le fournisseur de services dans votre fichier `config/app.php` dans `'providers'`:
   ```bash
   Spatie\Permission\PermissionServiceProvider::class,
   ```
      - Livrable :
   ```bash
   [Documentation Laravel Excel - Installation](https://spatie.be/docs/laravel-permission/v6/installation-laravel)
   ```