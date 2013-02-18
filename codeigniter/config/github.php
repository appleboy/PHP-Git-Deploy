<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @package     CodeIgniter Git Deploy
 * @author      Bo-Yi Wu
 * @copyright   Copyright (c) 2012, Bo-Yi Wu
 * @link        https://github.com/appleboy/PHP-Git-Deploy
 * @since       Version 1.0
 */

/**
 * Github config
 *
 * 1. git command absolute path
 * 2. project name, path and branch name
 *
 * Format:
 * array(
 *     'project_name' => array(
 *         'branch_name' => array('base_path' => 'folder_path')
 *     )
 * );
 *
 * If your github project url path:
 * https://github.com/appleboy/CodeIgniter-Git-Deploy
 *
 * For example: Single project, multi branch
 * array(
 *     'codeigniter-git-deploy' => array(
 *         'master' => array('base_path' => '/path/CodeIgniter-Git-Deploy_1/'),
 *         'develop' => array('base_path' => '/path/CodeIgniter-Git-Deploy_2/')
 *     )
 * );
 *
 * For example: Multi project, multi branch
 * array(
 *     'codeigniter-git-deploy' => array(
 *         'master' => array('base_path' => '/path/CodeIgniter-Git-Deploy_1/'),
 *         'develop' => array('base_path' => '/path/CodeIgniter-Git-Deploy_2/')
 *     ),
 *     'codeigniter-my-model' => array(
 *         'master' => array('base_path' => '/path/CodeIgniter-MY-Model_1/'),
 *         'develop' => array('base_path' => '/path/CodeIgniter-MY-Model_2/')
 *     )
 * );
 *
 */

$config['git_path'] = '/usr/local/bin/git';
$config['github'] = array(
    'php-git-deploy' => array(
        'master' => array('base_path' => '/home/git/test/PHP-Git-Deploy/')
    )
);
