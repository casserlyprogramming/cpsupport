=== Plugin Name ===
Contributors: casserlyprogramming
Tags: tickets, support, helpdesk
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

CP Support a wordpress plugin for tracking tickets and bugs etc

== Description ==

CP Support a wordpress plugin for tracking tickets and bugs etc. It has been 
designed as a simple to use (and hopefully to follow in code) plugin for wordpress
for our company (Casserly Programming). 

We hope that this plugin will be useful to all sorts of businesses and we will
continue development based on the Github Issues and tracking of issues on 
Wordpress too! 

If you have any comments or suggestions, please feel free to contact us and we 
will get back to you as soon as we can. http://casserlyprogramming.com/contact

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add some ticket types and statuses
4. Add the shortcodes to the pages, there are two

[1] [cp_tickets_grid]
This shows a grid of ALL of the tickets that are in the system. This will be 
getting worked on in future revisions to make it more user friendly and to use 
the features of the Status custom fields.

There are a number of options that you can add to this shortcode:

    'cp_type' - Filter on the type of tickets (the slug) we show here, default is off.

    'cp_product' - Filter on the products (the slug), default is off.

    'ul_css_class' - The list is a ul tag, use this to give it a css class

    'li_css_class' - Use this to give the li's a css class

    'new_ticket_page' - if this is set, it will show a link to the set page for creating
                        a new ticket.

    'new_ticket_class' - a class for the above <a> tag for the new ticket link.

[2] [cp_ticket_add]

== Frequently Asked Questions ==

= How do I get support? =

Please Visit http://casserlyprogramming.com to get support. There is no free support
on this plugin.

= Is it stable? =

This plugin is always release stable and is in production on the Casserly Programming website

== Changelog ==

= 1.0 =
* Initial release

