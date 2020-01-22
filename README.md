# PermissionUploader
Simple permission uploader website, basically a simple website to upload data and verify data

# Building
Commands to build the website  

> `npm install`  
> `composer install`  
> `copy .env.example .env`  
> `php artisan key:generate`  
> `php artisan migrate`   
> `php artisan serve`    

After building you'll need to enable registration on `config/app.php`. Then register your account and  
don't forget to disable registration again. After that go to your mysql database and change **roleLvl** to 1