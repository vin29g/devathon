<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_userdata(){
  $ci = &get_instance();
  $data=$ci->cod_model->get_user_info();
  $data['id']=$ci->ion_auth->get_user_id();
  return $data;
}