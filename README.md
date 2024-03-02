# installation Instruction

After cloning the repository, run the following command (after you CD into the repository on your machine):

- `./vendor/bin/sail build`

- `./vendor/bin/sail up`

- `php artisan composer install` (or `./vendor/bin/sail composer install`)

- `php artisan migrate` (or `./vendor/bin/sail artisan migrate`)

Then run the test suites with the following command

- `php artisan test` (or `./vendor/bin/sail artisan test`)
