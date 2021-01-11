# POKEDEX


## Installation

### Install the laravel API

Clone the pokedex repository: 
```
git clone 
```

Then down download the wordpress package and install it by using the following commands:
```
sudo wget https://wordpress.org/latest.tar.gz
```


Go on your [phpmyadmin](http://localhost/phpmyadmin/index.php). 

In phpmyadmin:

* Create a new database for your API, with empty tables, using **utf8mb4_general_ci** encoding.
* Click the phpMyAdmin icon in the upper left to return to the main page, then click the Users tab.
* Click the Edit privileges icon on the user you’ve just created for WordPress.
* In the Database-specific privileges section, select the database you’ve just created for WordPress under the Add privileges to the following database dropdown,   and click Go.
* The page will refresh with privileges for that database. Click Check All to select all privileges, and click Go.
* On the resulting page, make note of the host name listed after Server: at the top of the page. (This will usually be localhost.)


Now, visit http://localhost/wordpress/wp-admin/install.php, and enter the fields corresponding to your database and user informations.

If the wp-config.php file is not automaticaly created, do it in your wordpress root directory.

Relaunch [the php file](http://localhost/wordpress/wp-admin/install.php) for installation, and complete the information for your api website.

Your wordpress website should be now implemented. You can verify it by accessing to the [adminstration page](http://localhost/wordpress/wp-admin/).



### Install Wordpress API
Now, go to your /var/www/html/wordpress/wp-content/plugins folder in a terminal, using the following command
```
cd /var/www/html/wordpress/wp-content/plugins
```

Download the rest-api wordpress using wget, and unzip it:
```
wget https://downloads.wordpress.org/plugin/rest-api.2.0-beta15.zip
unzip rest-api.2.0-beta15.zip
```

Now, go on your wordpress administration page, then go to **Plugins > Installed Plugins** and activate **WP REST API**.



### Project setup

First, you'll have to clone then install all dependencies own by this project by using

```
git clone git@github.com:LoicChazeau/mvvm_twp.git
cd mvvm_twp/
npm install
```


### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Lints and fixes files
```
npm run lint
```


## Built With

* VueJs - The web framework used
* Wordpress REST API - The API
* Javascript - The backend 
* HTML - The background  of the front end 
* CSS - The shape of the front end


## Authors

* **Loïc Chazeau**
* **The AER <3**
