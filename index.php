<?php
error_reporting(E_ALL);
/**
 * @wordpress-plugin
 * Plugin Name:			ALPINE META BOX
 * Plugin URI:			https://www.sagardash.com
 * Description:       	Best Metabox ever.
 * Version:           	1.0.0
 * Author:       		Sagar Dash
 * Author URI:       	https://www.sagardash.com
 * Text Domain:       	tutme
 * License:           	GPL-2.0+
 * License URI:       	http://www.gnu.org/licenses/gpl-2.0.txt
 */



$book = new AlpineCustomPost("book");

$book->add_taxonomy("book_author");