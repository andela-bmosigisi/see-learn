# See, Learn.

[![StyleCI](https://styleci.io/repos/46489764/shield)](https://styleci.io/repos/46489764)
[![Travis](https://travis-ci.org/andela-bmosigisi/see-learn.svg?branch=develop)](https://travis-ci.org/andela-bmosigisi/see-learn/)
[![Coverage Status](https://coveralls.io/repos/andela-bmosigisi/see-learn/badge.svg?branch=develop&service=github)](https://coveralls.io/github/andela-bmosigisi/see-learn?branch=develop)

[Official Website](http://see-learn.herokuapp.com)

See-learn is a learning management system that allows users to learn various technologies, using the powerful resource of video, especially on YouTube. Users may upload video URLs which are accessed by other users, or by themselves on a later date.

## Usage

You may visit the [website](http://see-learn.herokuapp.com) to access the application.

To download and use this project you need:

- [PHP](http://php.net/downloads.php)
- [Composer](https://getcomposer.org)
- [Git](https://git-scm.com/downloads)

Then clone the repository in your local machine

```bash
$ git clone https://github.com/andela-bmosigisi/see-learn
```

Naviate to `see-learn`
```bash
$ cd see-learn
```

Install all the required dependencies.
```bash
$ composer install
```

Create an environment file with your systems credentials, by editing .env.example then run
```bash
$ cp .env.example .env
```

To serve the application in development mode:
```bash
$ php artisan serve
```

You can now access the application in the browser, using the URL provided in the command line.

You may also use laravel homestead to serve the app. Get it [here](http://laravel.com/docs/5.1/homestead).

## Features

- Uploading of YouTube videos.
- Editing and Deleting of videos.
- Adding and Editing of video categories.
- Organisation of videos into categories.
- Watching of videos, uploaded by all users.

## Testing

```bash
$ phpunit
```

## Contributing

You may contribute to this project in one of two ways:
- Open an issue to report a bug.
- Branch from develop, code, and send a pull request.

## License

This is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
