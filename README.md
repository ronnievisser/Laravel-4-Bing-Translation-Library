Laravel-4-Bing-Translation-Library
==================================

## Installation

Install this package through Composer. To your `composer.json` file, add:

```js
"require-dev": {
	"ronster/bing-translation": "dev-master""
}
```

Next, run `composer update` to download it.

Finally, add the service provider to `app/config/app.php`, within the `providers` array.

```php
'providers' => array(
	// ...

	'Ronster\BingTranslation\BingTranslationServiceProvider'
)
```

## Configuration

Run `php artisan config:publish Ronster/bingtranslation` to publish the package config file. Add your API key and your done.

## Useage

This package is a laravel 4 port of the Microsoft Bing Translation PHP wrapper. Instructions can be found here: [Microsoft Bing Translation PHP wrapper](http://www.codediesel.com/php/microsoft-bing-translate-php-wrapper/)

## Example
```php
$text = 'Hello world!';
$translatedTest = Bing::translate( $text, "en", "nl" );
dd($translatedText);
```
