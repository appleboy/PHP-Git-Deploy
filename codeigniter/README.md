CodeIgniter-Git-Deploy
======================

Using `Post-Receive Hooks` to deploy muliple projects with CodeIgniter automatically.

Ref: https://help.github.com/articles/post-receive-hooks

Installation/Usage
======================

Download files
----------------------

Download and drag the following files into your `application/` folder.

    $ cp config/github.php application/config/
    $ cp controllers/deploy.php application/controllers/

Configure your profile
----------------------

open `application/config/github.php` file with your editor. Following is config formats.

```php
$config['github'] = array(
    'project_name' => array(
        'branch_name' => array('base_path' => 'folder_path')
    )
);
```

`project_name` must be the same with your github project name, for example:

Your github project URL is https://github.com/appleboy/CodeIgniter-Git-Deploy

The `project_name` value is `CodeIgniter-Git-Deploy`, don't case sensitive.

Please refer the following example profiles.

##### Single project, Multi branch profile

```php
array(
    'codeigniter-git-deploy' => array(
        'master' => array('base_path' => '/path/CodeIgniter-Git-Deploy_1/'),
        'develop' => array('base_path' => '/path/CodeIgniter-Git-Deploy_2/')
    )
);
```

##### Multi project, Multi branch profile

```php
array(
    'codeigniter-git-deploy' => array(
        'master' => array('base_path' => '/path/CodeIgniter-Git-Deploy_1/'),
        'develop' => array('base_path' => '/path/CodeIgniter-Git-Deploy_2/')
    ),
    'codeigniter-my-model' => array(
        'master' => array('base_path' => '/path/CodeIgniter-MY-Model_1/'),
        'develop' => array('base_path' => '/path/CodeIgniter-MY-Model_2/')
    )
);
```

Setting Webhook URL
----------------------

Please refer the [Post-Receive Hooks Helper](https://help.github.com/articles/post-receive-hooks) page

![Webhook](http://farm8.staticflickr.com/7115/7836097364_d7629b427c_z.jpg "Webhook")

Author
======================

Bo-Yi Wu (appleboy) <appleboy.tw@gmail.com>
