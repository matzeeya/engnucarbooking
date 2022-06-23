## About ENGInventory

ENGInventory is a web application with API for data provider, feed exits data for InventoryNU and convert to corresponding file format.

ENGInventory is partial of routine and research (R2R) by MS.Mattareeya Rachbuasri and MR.Kantinan Makmee.
## How to install
1.Type command see below
```
composer install
```
2.Create .env configulation file in command line.
```
cp .env.example .env
```
> Or in windows use command
```
copy .env.example .env
```
3.Generate key in this project.
```
php artisan key:generate
```
4.Modify .env file to correspond value.
```
APP_NAME=
APP_URL=

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

LDAP_LOGGING=true
LDAP_CONNECTION=default
LDAP_HOST=
LDAP_USERNAME=""
LDAP_PASSWORD=
LDAP_PORT=389
LDAP_BASE_DN="dc=nu,dc=local"
```
6.Provision database. Use command below.
```
php artisan migrate
```
7.Run 
```
php artisan serve
```
### Test URL
http://localhost:8000/

8.Ldap test
```
php artisan ldap:test
```
Ses more..
https://ldaprecord.com/docs/laravel/v2/debugging/#logging-in
