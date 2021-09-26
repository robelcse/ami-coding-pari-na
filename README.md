Step-1: Clone or download this Repository 

Step-2: Place this file in your server(Local or something....)

Step-3: Copy the database name from .env file (check the downloaded file) and make a database with this name.

Step-4: php artisan migrate (this command needs to be run to migrate the database file)

Step-5: php artisan db:seed (if you want to generate some dummy data you need to run this command)

Step-6: php artisan passport:client --personal (to create A Personal Access Client)
after run this command may be it will ask you to give a token name you can type your access token name as your wish(Ex: authToken)

Step-7: now you can run this project file on your browser and see the output (Ex: localhost/Ami-codin-pari-na)



Section 1: User Authentication/Registration Page

#http://localhost/Ami_coding_pari_na/signin
#http://localhost/Ami_coding_pari_na/signup


Section 2: Khoj the search Page

#after login/register you can acces this page, #http://localhost/Ami_coding_pari_na


Section 3: API Endpoints 
you can test all user input 

#http://localhost/Ami_coding_pari_na/api/userInputs/userId/start_datetime/end_datetime 

Example: #http://localhost/Ami_coding_pari_na/api/userInputs/1/2021-01-01/2021-01-03



<h2>Signin Page</h2>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/robelcse/ami-coding-pari-na/blob/main/public/img/Screenshot_1.png" width="400"></a></p>


<h2>Signup Page</h2>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/robelcse/ami-coding-pari-na/blob/main/public/img/Screenshot_2.png" width="400"></a></p>


<h2>Khoj the search Page</h2>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/robelcse/ami-coding-pari-na/blob/main/public/img/Screenshot_3.png" width="400"></a></p>



<h2>Output</h2>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/robelcse/ami-coding-pari-na/blob/main/public/img/Screenshot_4.png" width="400"></a></p>