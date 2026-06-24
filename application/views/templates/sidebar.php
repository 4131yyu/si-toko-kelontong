<?php
$role = $this->session->userdata('role');
$current_controller = strtolower($this->uri->segment(1) ?: 'dashboard');
$current_method = strtolower($this->uri->segment(2) ?: 'index');