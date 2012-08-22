<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @package     CodeIgniter Git Deploy
 * @author      Bo-Yi Wu
 * @copyright   Copyright (c) 2012, Bo-Yi Wu
 * @license     MIT
 * @link        https://github.com/appleboy/CodeIgniter-Git-Deploy
 * @since       Version 1.0
 */
 
/**
 * github config
 * 
 * git command path   
 */
 
$config['git_path'] = '/usr/local/bin/git';
$config['github'] = array(
    'master' => array('base_path' => '/usr/home/git/Shell-Script/')
); 