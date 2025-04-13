# JKT48 Fanmade Website 
## Description
This is my personal website as a JKT48 fan, This website was built using Laravel framework version 11 and MySQL database.Initially I was inspired by my senior who created a mobile application with a similar concept, which motivated me to create a website like this.Please feel free to provide your feedback and suggestions so I can modify and improve the aspects of this website that need attention  please use the provided API endpoints wisely. 

## Installation
1. Clone the repository `git clone https://github.com/StarVinn/JKT48-Represented-Official-Website.git`
2. Run `composer install`
3. Run `touch .env`
4. Copy .env.example to .env
5. Edit .env to set your database credentials
6. Run `php artisan key:generate`
7. Run `php artisan migrate:fresh --seed`
8. Run `php artisan serve`

## Usage
1. Open a Web Browser and navigate to `http://127.0.0.1:8000/`
2. You have to register and login to access the dashboard
3. After login you can see all JKT48 members
4. If you want to add new member you can login as admin(check example on AdminSeeder.php)


## API Endpoints
### GET /api/members
- Retrieves a list of all JKT48 members
### GET /api/setlists
- Retrieves a list of all JKT48 setlists
### GET /api/setlists/{id}
- Retrieves a single JKT48 setlist by id


## Message
This API is a part of an ongoing development journey. I am committed to continuously improving and expanding its features to meet evolving needs and deliver better functionality over time. Regular updates will be made to ensure it remains relevant, reliable, and aligned with the best development practices. Your feedback and support are highly appreciated as I strive to make this API even more powerful and efficient in the future. Thank you for your interest in this project.
