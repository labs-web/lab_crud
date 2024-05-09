# Installation des packages

1. Adminlte 3.1
- install package 
```bash
npm install admin-lte@^3.1 --save
```

2. Laravel/ui
- install package 
```bash
composer require laravel/ui
```

1. Lange Localization

- install package 
```bash
php artisan lang:publish
```

- go to config/app.php, change 'fallback_locale' => 'en', in 'fallback_locale' => 'fr',
- and 'locale' => 'en' in 'locale' => 'fr',
- and 'fallback_locale' => 'en', in 'fallback_locale' => 'fr',
- and 'faker_locale' => 'en_EN', in 'faker_locale' => 'fr_FR',

4. maatwebsite/excel

- install package 
```bash
composer require maatwebsite/excel:^3.1
```

- then Go to composer.json and update "maatwebsite/excel": "\*" to "maatwebsite/excel": "3.1.48"
- run this commande
```bash
composer update
```

- Run this command php artisan vendor:
```bash
publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config
```

5. ckeditor5
- install package 
```bash
npm install --save @ckeditor/ckeditor5-build-classic
```

- add this JavaScript in app.js
```js
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( error => {
		console.error( 'There was a problem initializing the editor.', error );
	} );
```
6. Laravel spatie
   
- install package 
```bash
composer require spatie/laravel-permission
```
- add the service provider in your config/app.php file in 'providers':
```bash
    Spatie\Permission\PermissionServiceProvider::class,
```
