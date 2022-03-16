<img src="https://media.giphy.com/media/gPBKtKGk00TfD3D6mY/giphy.gif">

# Blog

This is a laravel project! Here you can make some comments on a blog post(ish) and also like a comment! YEY fun.

# Installation

1. You can clone this repo and open it with vs code.
2. Clone the project and set up your DB. 
3. Run: php artisan serve, php artisan migrate:fresh --seed to get our DB.
4. Visit the localhost in your browser.
5. Sign up, login and start liking comments! 




# Code review written by [Patrik Staaf](https://github.com/patrikstaaf) & [Theo Sandell](https://github.com/theo0165).

1. `LoginController:16` Instead of 2 methods, create a separate invokable controller for show login form
2. `LogoutController:18-21` Too many curly brackets
3. `RegisterController:20` Not validating for email
4. `RegisterController:21` No min length for password
5. `LoginController:22` Not validating email
6. `Models:Comment:18` Comments have a comments:hasmany relationship with itself, why?
7. `Models:Likes:19` Likes has many comments?
8. `likes-migration:18-19` Use foreignId or unsignedBigIntiger for foreign keys
9. `likes-comment:18` Use foreignId or unsignedBigIntiger for foreign keys
10. `Dashboard.blade.php` Not using layout
11. `Login.blade.php` Not using layout
12. `index.blade.php` not used?
13. `Multiple view files` Import bootstrap twice
14. Remove welcome.blade.php
15. Mixing middleware (some in a construct method, some in routes)
16. `CreateAccountTest:20` No need to create a user in the register test
17. `LoginTest:27` Password will be hashed in your User model
18. `LogoutTest:16` This test will not working, posting to login instead of logout and then logging out with auth facade
19. `ExampleTest` remove.
20. Auth controllers from Laravel UI: remove.

