<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Post-Receive Hooks API
 *
 * @author      appleboy
 * @copyright   2012 appleboy
 * @link        https://github.com/appleboy/PHP-Git-Deploy
 * @package     CodeIgniter Git Deploy
 */
class Deploy extends CI_Controller
{
    /**
     * Default __construct
     *
     * @author appleboy
     */
    public function __construct()
    {
        parent::__construct();
        $this->config->load('github');
    }

    /**
     *
     * Post-Receive Hooks
     *
     * @author appleboy
     */
    public function receive()
    {
        // receive git payload
        $payload = $this->input->get_post('payload');
        // load git command path config
        $git_config = $this->config->item('github');
        $git_path = $this->config->item('git_path');

        if ($payload and is_array($git_config)) {
            $payload = json_decode($payload);

            log_message('debug', 'Post-receive hook initial');

            foreach ($git_config as $key => $val) {

                // check repository name exist in config
                $repository_name = strtolower($payload->repository->name);
                if ($repository_name != strtolower($key)) {
                    continue;
                }

                foreach ($val as $k => $v) {
                    // check if match payload ref branch
                    $head = 'refs/heads/' . $k;
                    if ($payload->ref != $head) {
                        continue;
                    }

                    // git reset head and pull origin branch
                    if (isset($v['base_path']) and !empty($v['base_path'])) {
                        $base_path = realpath($v['base_path']) . '/';

                        $shell = sprintf('%s --git-dir="%s.git" --work-tree="%s" reset --hard HEAD',
                            $git_path, $base_path, $base_path);
                        log_message('debug', '$shell value ' . $shell);
                        $output = shell_exec(escapeshellcmd($shell));

                        $shell = sprintf('%s --git-dir="%s.git" --work-tree="%s" clean -f',
                            $git_path, $base_path, $base_path);
                        log_message('debug', '$shell value ' . $shell);
                        $output = shell_exec(escapeshellcmd($shell));

                        $shell = sprintf('%s --git-dir="%s.git" --work-tree="%s" pull origin %s',
                            $git_path, $base_path, $base_path, $k);
                        log_message('debug', '$shell value ' . $shell);
                        $output = shell_exec(escapeshellcmd($shell));
                    }
                }
            }
        }
    }
}
