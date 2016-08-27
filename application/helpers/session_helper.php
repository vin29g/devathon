<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function userdata( $key, $val = null ){
  $ci = &get_instance();
  if ( $val != null ){
    $ci->session->set_userdata( $key, $val );
  } else {
    return $ci->session->userdata( $key );
  }
}