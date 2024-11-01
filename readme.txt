=== WP-XAjax ===
Contributors: LeoGermani
Donate link: http://pirex.com.br/wordpress-plugins
Tags: axax, plugins, themes, development, framework, xajax
Requires at least: 2.2
Tested up to: 2.5
Stable tag: 1.0

Provides an easy way for plugin/theme developers to use Xajax framework to write ajax applications. 

== Description ==


Provides an easy way for plugin/theme developers to use Xajax framework to write ajax applications. 

== Installation ==

1. on Regular Wordpress

. Copy the files to you root plugins folder, so you have a tree like:

.../wp-content/plugins/wp-xajax.php
.../wp-content/plugins/wp-xajax/xajax.inc.php
.../wp-content/plugins/wp-xajax/...all the other files

. Activate the plugin

2. on Wordpress MU

. Copy the files to you root plugins folder, so you have a tree like:

.../wp-content/mu-plugins/wp-xajax.php
.../wp-content/mu-plugins/wp-xajax/xajax.inc.php
.../wp-content/mu-plugins/wp-xajax/...all the other files


== Usage ==

For an overview on how to use XAjax and complete documentation, visit its wiki at http://xajaxproject.org/wiki/.

Here you find a very pratical tutorial on how to write a wordpress plugin using xajax. This tutorial is based on the great "Learn xaja in 10 minutes", wich you find here: http://xajaxproject.org/wiki/Tutorials:Learn_xajax_in_10_Minutes

How to write a plugin using wp-xajax.


1. Install wp-xajax

Obviusly you have to install it at first. Nothing will happen when you activate it, thats the way it is.


2. Write your php function

Now, inside your plugin, you will write you php function that will be dinamically called through javascript.

This function can do anything you like: access the database, send emails, call other functions.. whatever.

The only thing this function can not do is to produce any output to the screen. It cannot have any "echo" calls.

In the next step we will see how to send output to the screen. So, lets say we want a function to send an email:

function myplugin_sendEmail(){

	$friends = 'bob@example.org,susie@example.org';
    mail($friends, "blog updated", 
      'I just put something on my blog: http://blog.example.com');

}

This function does not receive any argumnent, but you can have a function that receives as many argumnents as you like.


3. Add some response to your function

Lets say you have a div next to your button with the id "response_div". Then you can add this to you function:

function myplugin_sendEmail(){

	$friends = 'bob@example.org,susie@example.org';
    mail($friends, "blog updated", 
      'I just put something on my blog: http://blog.example.com');

	$objResponse = new xajaxResponse();
	$objResponse->addAssign("response_div","innerHTML","Email Sent!");
	return $objResponse;


}

You will allways interact with the page objects using their ids. There are many ways in wich you can interact, have a look at
the full doc here: http://xajaxproject.org/wiki/Documentation:xajaxResponse.inc.php


4. Call your function

A javascript function will be created. It will be called xajax_YourFunctionName.

So you may have a button, and add to this button the event Handler:

input type="button" onclick="xajax_myplugin_sendEmail()";

if you have any arguments to pass, do it now as if it was a regular javascript function.


5. Register your function

Create a function that will register your xajax_function as follow:

function myplugin_xajax(){
gobal $xajax;
$xajax->registerFunction("myplugin_sendEmail");
}

And then add an action to call it:

add_action('init','myplugin_xajax');

6. Enjoy!



== ChangeLog ==

1.0 (06/06/2008)
. Released


