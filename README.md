FlashBox Test Project 

please run following commands : 
```bash
composer install
php artisan jwt:secret
php artisan migrate
php artisan db:seed
```


notes: 
- in the test, you mentioned `buy the product` and you did not say anything about cart,so i did not implement it to save time although it was not a hard task
- in the test, you mentioned `add product` in seller section, i did not implement `patch` and `delete` to save time.
