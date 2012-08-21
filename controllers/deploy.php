<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deploy extends CI_Controller
{
    /**
     * Default __construct
     *
     * @author appleboy
     **/
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
        $payload = $this->input->get_post('payload');
        $config = $this->config->item('github');
        $git_path = $this->config->item('git_path');
        
        if ($payload and is_array($config)) {
            $payload = json_decode($payload);
            
            // enable debug message
            log_message('debug', 'payload value ' . $payload);
            
            foreach ($config as $key => $val) {
                $head = 'refs/heads/' . $key;
                if ($payload['ref'] != $head) {
                    continue;
                }
                
                if (isset($val['base_path']) and !empty($val['base_path'])) {
                    $shell = sprintf('%s --git-dir="%s.git" --work-tree="%s" reset --hard HEAD', 
                        $git_path, $val['base_path'], $val['base_path']);
                    log_message('debug', '$shell value ' . $shell);
                    shell_exec($shell);
                    
                    $shell = sprintf('%s --git-dir="%s.git" --work-tree="%s" clean -f', 
                        $git_path, $val['base_path'], $val['base_path']);
                    log_message('debug', '$shell value ' . $shell);
                    shell_exec($shell);
                    
                    $shell = sprintf('%s --git-dir="%s.git" --work-tree="%s" pull origin %s', 
                        $git_path, $val['base_path'], $val['base_path'], $key);
                    log_message('debug', '$shell value ' . $shell);
                    shell_exec($shell);
                }
            }        
        }
    }
}