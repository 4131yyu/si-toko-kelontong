<?php
$role = $this->session->userdata('role');
$current_controller = strtolower($this->uri->segment(1) ?: 'dashboard');
$current_method = strtolower($this->uri->segment(2) ?: 'index');

if (!function_exists('sidebar_active')) {
    function sidebar_active($controller, $method = null)
    {
        $CI =& get_instance();
        $current_controller = strtolower($CI->uri->segment(1) ?: 'dashboard');
        $current_method = strtolower($CI->uri->segment(2) ?: 'index');
        $controller = strtolower($controller);
        $method = $method !== null ? strtolower($method) : null;

        if ($method !== null) {
            return $current_controller === $controller && $current_method === $method ? 'active' : '';
        }
        return $current_controller === $controller ? 'active' : '';
    }
}
?>