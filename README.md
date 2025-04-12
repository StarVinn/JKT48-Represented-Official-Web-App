# JKT48 API WITH ADMIN VIEW
## Description
This is a simple API with admin view to add & delete JKT48 members . It is built using Laravel 11 
## Installation
1. Clone the repository `git clone https://github.com/StarVinn/JKT48-Represented-Official-Website.git`
2. Run `composer install`
3. Run `touch .env`
4. Copy .env.example to .env
5. Edit .env to set your database credentials
6. Run `php artisan key:generate`
7. Run `php artisan migrate`
8. Run `php artisan db:seed`
9. Run `php artisan serve`

## Usage
1. Open a Web Browser and navigate to `http://127.0.0.1:8000/`
2. You have to login or register 
3. After login you can see all JKT48 members
4. If you want to add new member you can login as admin(check example on AdminSeeder.php)


## API Endpoints
### GET /api/members
- Retrieves a list of all JKT48 members
### POST /api/members
- Creates a new JKT48 member
### DELETE /api/members/{id}
- Deletes a single JKT48 member by ID


## Message
This API is a part of an ongoing development journey. I am committed to continuously improving and expanding its features to meet evolving needs and deliver better functionality over time. Regular updates will be made to ensure it remains relevant, reliable, and aligned with the best development practices. Your feedback and support are highly appreciated as I strive to make this API even more powerful and efficient in the future.
