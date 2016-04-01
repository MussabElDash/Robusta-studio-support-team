# Robusta-studio-support-team
# Gitflow setup
#####Install git-flow:
  brew install git-flow
##### Project setup:
- Go to the project directory
- Run:

        git pull origin master
- Run: 

        git flow init
** Note: 

- You should use the default configurations.
- By default, you will be checked out to develop branch.
- To work on a new feature run:

        git flow feature start FEATURE_NAME
- To finish your feature:

        git flow feature finish FEATURE_NAME
- To publish your feature:

        git flow feature publish FEATURE_NAME
- Check [this link](http://danielkummer.github.io/git-flow-cheatsheet/) for more options.
- [This link](https://www.atlassian.com/pt/git/workflows#!workflow-gitflow) illustrates the concepts behind git workflows.

# .env file
  - .env.example file contains an example.
  - Create .env file.
  - Copy .env.example file.
  - Paste it in your .env file and consider customizing it for your machine configuraitons.

# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
