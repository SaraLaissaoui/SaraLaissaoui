### Installation 
composer install
### Migrate database
php artisan migrate
### Set Up Upload Image
php artisan storage:link
### Generate a model
php artisan krlove:generate:model User --table-name=users


### Little updates
need fix~public path for tables pics

Tables added -> Linked to rooms route(/tables) => done*
Delete price from room => done*
Photo no longer required room => done *

Suppliers added -> Linked to ingrediants route(/suppliers) => Done*
Stock delete => Done*
Stock show => Done*

Room show => Done*
Room edit => Done*
Room delete => Done*
Fix category edit issue => Done*
Tables status totally fixed => Done*

make default picture for food/plat/pack/room


Check back stockservice