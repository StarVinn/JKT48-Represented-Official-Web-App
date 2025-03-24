# JKT48 API WITH ADMIN VIEW
## Description
This is a simple API with admin view to add & delete JKT48 members . It is built using Laravel 11 
## Installation
1. Clone the repository
2. Run `composer install`
3. Run `touch .env`
4. Copy .env.example to .env
5. Run `php artisan key:generate`
6. Run `php artisan migrate`
7. Run `php artisan db:seed`
8. Run `php artisan serve`

## Usage
1. Open a web browser and navigate to `http://127.0.0.1:8000/`
2. In the admin view, you can add new JKT48 members
3. You can also view all existing members
4. You can also delete existing members

## API Endpoints
### GET /api/members
- Retrieves a list of all JKT48 members
### POST /api/members
- Creates a new JKT48 member
### DELETE /api/members/{id}
- Deletes a single JKT48 member by ID


## Message
This API is a part of an ongoing development journey. I am committed to continuously improving and expanding its features to meet evolving needs and deliver better functionality over time. Regular updates will be made to ensure it remains relevant, reliable, and aligned with the best development practices. Your feedback and support are highly appreciated as I strive to make this API even more powerful and efficient in the future.
