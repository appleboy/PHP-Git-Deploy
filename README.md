PHP-Git-Deploy
======================

Using `Post-Receive Hooks` to deploy muliple projects automatically. [![Build Status](https://secure.travis-ci.org/appleboy/PHP-Git-Deploy.png)](http://travis-ci.org/appleboy/PHP-Git-Deploy)

Ref: https://help.github.com/articles/post-receive-hooks

Requirements
======================

PHP-Git-Deploy works with PHP 5.3 or later.

Installation via Composer
======================

Create a composer.json file in your project root and use it to define simply your dependencies:

```
{
    "require": {
        "appleboy/php-git-deploy": "1.0.*"
    }
}
```

Then install Composer in your project (or download the composer.phar directly):

    $ curl -s http://getcomposer.org/installer | php

And finally ask Composer to install the dependencies:

    $ php composer.phar install

Installation/Usage
======================

Download files
----------------------

Download and drag the following files into your `application/` folder.

    $ cp -r src/Web your_www/

Configure your profile
----------------------

open `src/Web/config.php` file with your editor. Following is config formats.

```php
$config['github'] = array(
    'project_name' => array(
        'branch_name' => array('base_path' => 'folder_path')
    )
);
```

`project_name` must be the same with your github project name, for example:

Your github project URL is https://github.com/appleboy/PHP-Git-Deploy

The `project_name` value is `PHP-Git-Deploy`, don't case sensitive.

Please refer the following example profiles.

##### Single project, Multi branch profile

```php
array(
    'php-git-deploy' => array(
        'master' => array('base_path' => '/path/PHP-Git-Deploy_1/'),
        'develop' => array('base_path' => '/path/PHP-Git-Deploy_2/')
    )
);
```

##### Multi project, Multi branch profile

```php
array(
    'php-git-deploy' => array(
        'master' => array('base_path' => '/path/PHP-Git-Deploy_1/'),
        'develop' => array('base_path' => '/path/PHP-Git-Deploy_2/')
    ),
    'codeigniter-my-model' => array(
        'master' => array('base_path' => '/path/CodeIgniter-MY-Model_1/'),
        'develop' => array('base_path' => '/path/CodeIgniter-MY-Model_2/')
    )
);
```

Create New index.php
----------------------

Create new file `your_www/Web/index.php`, copy the following source code and paste into index.php file.

```php
<?php
require_once('Deplpoy.php');
$deploy = new \Web\Deploy;
$deploy->index();
```

Setting Webhook URL
----------------------

Please refer the [Post-Receive Hooks Helper](https://help.github.com/articles/post-receive-hooks) page

![Webhook](http://farm8.staticflickr.com/7115/7836097364_d7629b427c_z.jpg "Webhook")

Author
======================

Bo-Yi Wu (appleboy) <appleboy.tw@gmail.com>
