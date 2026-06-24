<?php
$role = $this->session->userdata('role');
$current_controller = strtolower($this->uri->segment(1) ?: 'dashboard');
$current_method = strtolower($this->uri->segment(2) ?: 'index');

if (!function_exists('sidebar_active')) {
    function sidebar_active($controller, $method = null)
    {
        $CI =& get_instance();