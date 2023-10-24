# php-workspace

PHP Workspace for Codespaces


## AppServer

- Apache + PHP
- Foward for `HTTP(80)` in Codespaces
- port 80
- DocumentRoot /workspace/public


## DBServer

- MySQL
- port 3306
- Preset database `laravel`
- Preset account and password `laravel`

### phpMyAdmin

- It's database manage application
- Foward for `phpMyAdmin(8888)` in Codespaces
- port 8888


## modules and libraries

Installed exsample ...

- Composer
- mbstring
- PDO MySQL
- Xdebug

More details `$ php -m`

---

## How to use

### Run for Servers

It's already started when bootstrap codespaces.

### Access to your coded

Codespaces ports list has `HTTP(80)`.  
You can click what open brower icons When mouseover for here address text.

### manage for your database

Codespaces ports list has `phpMyAdmin(8888)`.  
You can click what open brower icons When mouseover for here address text.

### use "break points"

Click for "Run and debug" from activity bar, positioned window left
Select for "Listen for Xdebug" and click "Run".

Run Xdebug in port 9003.  

When running Xdebug, stop at "break points", triggerd access for web server.
