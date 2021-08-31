FlashBox Test Project 

please run following commands : 
```bash
composer install
php artisan jwt:secret
php artisan migrate
php artisan db:seed
```

#### Admin
Default admin user pass is : admin@admin.com 12345678

routes: 

`{{ _.base }}/api/admin/users` list system users

`{{ _.base }}/api/admin/seller/create` create new seller store


#### Seller

`{{ _.base }}/api/seller/stores/list` list stores

`{{ _.base }}/api/seller/stores/9` single store

`{{ _.base }}/api/seller/stores/9/products/new` add a new product

#### User

routes :

`{{ _.base }}/api/user/near/35.694778/51.419852` show nearby stores in the given lat/lon

`{{ _.base }}/api/user/single/35.694778/51.419852/9` show single store with id and cordinates

`{{ _.base }}/api/user/purchases` show user purchases

`{{ _.base }}/api/user/single/35.694778/51.419852/9/buy` link to buy a single product

#### Feature Test
![go](https://github.com/arashrasoulzadeh/flashbox/actions/workflows/laravel.yml/badge.svg)

Available at : /tests/Feature


notes: 
- in the test, you mentioned `buy the product` and you did not say anything about cart,so i did not implement it to save time although it was not a hard task
- in the test, you mentioned `add product` in seller section, i did not implement `patch` and `delete` to save time.
