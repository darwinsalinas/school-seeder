<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Custom Command to seed database using model factory faker and custom provider for school names

### How to use:

1. Clone the repo:

```
git clone https://github.com/darwinsalinas/school-seeder.git
```

2. Create a `.env` file and copy `.env.example` content into `.env` file, then add the database credentials

3. Install dependencies:

```
composer install
```

4. Excute migrations:

```
php artisan migrate
```

5. Excute seed for model:

```
php artisan seed:model school
```

If you want to use the `SchoolFakerProvider` in other factory you can add the provider to the faker instance like this:

```
fake()->addProvider(new SchoolFakerProvider(fake()));
```

And then generate name like this:

```
fake()->schoolName()
```

### A full example:

```
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    public function definition()
    {
        fake()->addProvider(new SchoolFakerProvider(fake()));

        return [
            'name' => fake()->schoolName(),
        ];
    }
}
```
