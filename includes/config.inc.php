<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

global $config;

$config['smarty']['template_dir'] =
'templates/main/template/';
$config['smarty']['compile_dir'] =
'templates/main/templates_c/';
$config['smarty']['config_dir'] =
'templates/main/configs/';
$config['smarty']['cache_dir'] =
'templates/main/cache/';

$config['debug']=false;
$config['mysql']['user'] = 'root';
$config['mysql']['password'] = '';
$config['mysql']['host'] = 'localhost';
$config['mysql']['database'] = 'enotecaonline';

//configurazione server smtp per invio email

$config['smtp']['port'] = '465';
$config['smtp']['host'] = 'ssl://out.virgilio.it';
$config['smtp']['smtpauth'] = true;
$config['smtp']['username'] = 'greta.dipaolantonio@virgilio.it';
$config['smtp']['password'] = 'asdfg123';

$config['email_webmaster']='greta.dipaolantonio@virgilio.it';
$config['url_enoteca']='http://localhost/enoteca2/';

function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

?>
