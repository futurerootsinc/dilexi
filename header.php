<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="all">
<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css" type="text/css" media="all">

<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/teachers/assets/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/teachers/assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/teachers/assets/favicon/favicon-16x16.png">
<link rel="manifest" href="/wp-content/themes/teachers/assets/favicon/manifest.json">
<link rel="mask-icon" href="/wp-content/themes/teachers/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="/wp-content/themes/teachers/assets/favicon/favicon.ico">
<meta name="msapplication-config" content="/wp-content/themes/teachers/assets/favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">

<script type="text/javascript" src="https://commonwealthandcouncil.com/wp-content/themes/commonwealth/js/materialize.min.js"></script>

</head>

<body <?php body_class(); ?>>
