<?php

$settings = array(
	'user_entity_class' => 'Usuario\Entity\Usuario',
	'enable_default_entities' => false,
	'enable_registration' => false,
	'enable_username' => false,
	'auth_adapters' => array(100 => 'ZfcUser\Authentication\Adapter\Db'),
	'enable_display_name' => true,
	'auth_identity_fields' => array('email'),
	'login_form_timeout' => 300,
	'user_form_timeout' => 300,
	'use_redirect_parameter_if_present' => true,
	'login_redirect_route' => 'dashboard',
	'logout_redirect_route' => 'home',
	'enable_user_state' => false, 
);