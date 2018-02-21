# berserkers.net

#### Requirements
PHP
Composer

#### Serve Application
To serve the application by calling the below command in the root app directory.
```Shell
/bin/bash serve
```

#### Deploying to a shared server
If your shared server runs Apache, then you need to create a .htaccess file in your web server root directory (usually named htdocs, public, public_html or www) with the following content:
```htaccess
<IfModule mod_rewrite.c>
   RewriteEngine on
   RewriteRule ^$ public/     [L]
   RewriteRule (.*) public/$1 [L]
</IfModule>
```

#### Display Errors
To display full error details in the application set:
```PHP
  'displayErrorDetails' => false, // set to false in production
```
in the file ```src/settings``` folder.

#### Further Docs
[Slim Documentation](https://www.slimframework.com/docs/v3/tutorial/first-app.html)