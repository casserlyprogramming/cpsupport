CP Support
=========

CP Support a wordpress plugin for tracking tickets and bugs etc. It has been 
designed as a simple to use (and hopefully to follow in code) plugin for wordpress
for our company (Casserly Programming). 

We hope that this plugin will be useful to all sorts of businesses and we will
continue development based on the Github Issues and tracking of issues on 
Wordpress too! 

If you have any comments or suggestions, please feel free to contact us and we 
will get back to you as soon as we can. 

=========
How to use the plugin
=========
All you need to do is to install the plugin as usual (you can even download the 
zip by using the Download as Zip in Github). Remember to activate the plugin. 

Then set up your Variables. Under the Tickets Menu in the Wordpress admin are 
3 Variable settings. The Ticket Types, Statuses and Products. These are usual
Taxonomies, simply create them as usual. 

[1] Ticket Types - What type of tickets will you be expecting. Features? Bugs? 
Support Tickets? Choose them here. 

[2] Status - What status is the bug. The options of whether this is closed or 
the priority will become more prevalent in future versions.

[3] Product - For us this would be software/websites that we maintain (including
this plugin). However, this could be any product that you offer support for. 

When you have set up the possibilities, you can add shortcodes to the pages that 
you want to show to allow the customer to use. There are currently two shortcodes:

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

Shows a form that allows your customers to create a new ticket. You will then
have that ticket show up in your back end and in the above tickets grid shortcode. 

If you wish for certain ticket types to remain hidden, simply create a private
ticket type and make sure that none of your cp_tickets_grid shortcodes reference
that ticket type. 

=========
How to contribute
=========
If you wish to contribute to this project, please follow the following steps:

[1] Fork the repository on github

[2] Create a branch for the commit

[3] Code into that new branch

[4] Send a pull request when you are done

[5] Rinse and repeat

Thanks for reading this simple documentation, please feel free to get in touch 
with us with any questions.     

