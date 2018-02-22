# berserkers.net

#### Requirements
PHP  
Composer  

#### Dependencies
Slim  
Monolog  
Twig  


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
  'displayErrorDetails' => true, // set to false in production
```
in the file ```src/settings``` folder.

#### Dumping Errors
Use ```dump()``` in a variable to print it neatly to the page and kill the application

i.e. dump of our response variable
```html
Response {#38 ▼
  #status: 200
  #reasonPhrase: ""
  #protocolVersion: "1.1"
  #headers: Headers {#39 ▼
    #data: array:1 [▶]
  }
  #body: Body {#37 ▼
    #stream: stream resource @50 ▶}
    #meta: null
    #readable: null
    #writable: null
    #seekable: null
    #size: null
    #isPipe: null
  }
}
```

#### Further Docs
[Slim Documentation](https://www.slimframework.com/docs/v3/tutorial/first-app.html)
[Twig Documentation](https://twig.symfony.com/doc/2.x/)
[Monolog Documentation](https://github.com/Seldaek/monolog/blob/master/doc/01-usage.md)