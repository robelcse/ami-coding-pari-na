Step-1: Clone or download this Repository 

Step-2: Place this file in your server(Local or something....)

Step-3: Copy the database name from .env file (check the downloaded file) and make a database with this name.

Step-4: php artisan migrate (this command needs to be run to migrate the database file)

Step-5: php artisan db:seed (if you want to generate some dummy data you need to run this command)

Step-6: php artisan passport:client --personal (to create A Personal Access Client)

Step-7: now you can run this project file on your browser and see the output (Ex: localhost/Ami-codin-pari-na)