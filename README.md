# Summary
This project demonstrates how to include an external package that includes Laravel and simply send a request.
Objects entries are not related to each other (ORM). Used to make the system more efficient with the <a href="https://vitejs.dev/" _target="blank">Vite Frontend</a> tool.  
<p align="center">
<img src="https://www.alisaslan.com/4-of-them.png" alt="Home">
</p>

## Prerequisites

- **[Composer](https://getcomposer.org/)**
- **[NodeJS.](https://nodejs.org/en)**
- **[Version > PHP 8.1](https://www.php.net)**

## Installation
Below is how you can instruct your audience on installing and setting up your app.

- Get a API <code>https://candidate-testing.api.royal-apps.io/docs</code>
- Clone the repo <br>
<code>git clone https://github.com/aliarslan93/4-of-them.git</code><br>
<code>cd /4-of-them</code>

- Laravel vendor Update<br>
 <code>composer update</code>

- Install NPM packages<br>
 <code>npm install && npm run dev</code>
<br>
- Artisan serve<br>
 <code>php artisan serve</code> <br>


You will go on your browser to <b>http://127.0.0.1:8000/</b>.

## With Out Vite

app.blade.php<br>
<code>@vite(['resources/scss/app.scss', 'resources/js/app.js']) to {!! asset('css/bootstrap.min.css') !!}</code>

## Add Your Custom Repository
<details>

- You can add your custom repository to <mark style="background:#221c1c; color:white;">app\Providers\RepositoryServiceProvider.php</mark>

<code>
 $this->app->bind(
           CustomRepositoryInterface::class,
            CustomRepository::class
        );

</code>


 - Add your repository class on your main Controller


<code>
use App\Repositories\Interfaces\CustomAppInterface;<br>
<br>
 protected $customRepository; <br>
    public function __construct(customInterface $customRepository)<br>
    {<br>
        $this->customRepository = $customRepository;<br>
    }<br>

</code>
</details>
