<?php

namespace Config;

use App\Validation\UserLogin;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
		UserLogin::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $register = [
		'username' => [
			'label' => 'Username',
			'rules' => 'required|min_length[5]|is_unique[user.username]',
			'errors' => [
				'required' => 'Rules.username.required',
				'min_length' => 'Rules.username.min_length',
				'is_unique' => 'Rules.username.is_unique'
			]
		],
		'password' => [
			'label' => 'Password',
			'rules' => 'required|min_length[5]',
			'errors' => [
				'required' => 'Rules.password.required',
				'min_length' => 'Rules.password.min_length'
			]
		],
		'repeat_password' => [
			'label' => 'Repeat Password',
			'rules' => 'matches[password]',
			'errors' => [
				'matches' => 'Rules.repeat_password.matches'
			]
		]
	];

	public $login = [
		'username' => [
			'label' => 'Username',
			'rules' => 'required',
			'errors' => [
				'required' => 'Rules.username.required'
			]
		],
		'password' => [
			'label' => 'Password',
			'rules' => 'required|validateUser[username,password]',
			'errors' => [
				'required' => 'Rules.password.required',
				'validateUser' => 'Username Atau Email Tidak Cocok'
			]
		]
	];
}
