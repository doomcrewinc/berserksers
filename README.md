 berserkers.net

### TODO

- [X] ~~Awesome viking stylizing~~
- [X] ~~IPV4/IPV6 validator~~
- [X] ~~Incorporate into Slim Framework~~
- [ ] Results screen should efficiently show the WHOIS Record, DNS Zone info, when not logged in, when logged in it will display a lot more. 
	- [ ] It should show if the host is ![UP](https://placehold.it/20/00FF00/000000?text=UP) or ![DOWN](https://placehold.it/20/FF0000/000000?text=DOWN)
	- [ ] When logged in as a user
	- [ ] Option to run traceroute and display it somehow
	- [ ] Option to ping domain n times (ping -c domain.com) and display it somehow
	- [ ] ~~Option to add domain to smokeping daemon for 7 day monitoring of latency. ~~ 
- [ ] When Logged in as an Admin, Admin Page/Console
	- [ ] Admin export of: REMOTEIP, SEARCH_STR, Basic Browser info to either JSON or CSV for analytics
	- [ ] Add/Create Users
	- [ ] CRUD DB options
	- [ ] User Perms -> Restrict users from doing x or y, restrict non-users from searching based on IP or search string
	- [ ] ~~Enable/Disable GDPR message ~~
	- [ ] Enable/Disable the EU from using the tool
	- [ ] Enable/Disable maintenance mode type screen
	- [ ] Create ... notification's or pop ups or some shit that can float or whatever

- [ ] On results screen, include a parsed link to the following:
	- [ ] Global DNS Propagation [https://www.whatsmydns.net/#A/**domain.com**](https://www.whatsmydns.net/#A/domain.com)
	- [ ] GeoPeeker [https://geopeeker.com/fetch/?url=**domain.com**](https://geopeeker.com/fetch/?url=domain.com)
	- [ ] SSL Labs [https://www.ssllabs.com/ssltest/analyze.html?d=**domain.com**&hideResults=on&latest](https://www.ssllabs.com/ssltest/analyze.html?d=domain.com&hideResults=on&latest)
	- [ ] Mozilla Observatory [https://observatory.mozilla.org/analyze/**domain.com**](https://observatory.mozilla.org/analyze/domain.com)
	- [ ] Google PageSpeed [https://developers.google.com/speed/pagespeed/insights/?url=**https%3A%2F%2Fwww.domain.com%2F**](https://developers.google.com/speed/pagespeed/insights/?url=https%3A%2F%2Fwww.domain.com%2F)
	- [ ] W3 Validator [https://validator.w3.org/nu/?doc=**https%3A%2F%2Fwww.domain.com%2F**](https://validator.w3.org/nu/?doc=https%3A%2F%2Fwww.domain.com%2F)
- [ ] Debate pros/cons of outsourcing whois lookup vs internal handling (the massive array) Re: Request Limits vs Self-Sufficiency.
- [ ] ARIN/RIPE IP WhoIS [whois-service](http://www.webservicex.net/whois.asmx?op=GetWhoIS) performs a domain WHOIS, not an IP WhoIS
- [ ] who-hosts-this/whatcms API Integration
	- [ ] OR create our own (started to work on it, but forgot about it)
- [ ] Potential graphs of traffic in/out (can be done with a variety of different packages, python, webalyzer, etc)
- [ ] Cloudflare Integration ⤴️
- [ ] Create API, limits keys etc so we can license this bitch and get fat paid.

All conf files will be outside the webroot, and db info will be pulled from either a json file or a conf file.
In time this will be modular and ran on pop's across the globe so the ability to pull traceroute/ping from x.x.x.1 and x.x.x.2 and x.x.x.3 is required.  In the end I'd like to have a possible traceroute/ping from 100+ points.
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
[whois service](http://www.webservicex.net/whois.asmx?op=GetWhoIS)
