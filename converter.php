#!/usr/bin/php -q
<?php 

# Install PSR-0-compatible class autoloader
spl_autoload_register(function($class){
	require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

# Get Markdown class
use \Michelf\MarkdownExtra;

$text = file_get_contents($argv[1]);
$html = MarkdownExtra::defaultTransform($text);

echo $html;

?>
