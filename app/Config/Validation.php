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

	public $barang = [
		'nama' => [
			'label' => 'Nama Barang',
			'rules' => 'required|min_length[3]',
			'errors' => [
				'required' => 'Rules.nama.required',
				'min_length' => 'Rules.nama.min_length'
			]
		],
		'harga' => [
			'label' => 'Harga Barang',
			'rules' => 'required|is_natural',
			'errors' => [
				'required' => 'Rules.harga.required',
				'is_natural' => 'Rules.harga.is_natural'
			]
		],
		'stock' => [
			'label' => 'Stock Barang',
			'rules' => 'required|is_natural',
			'errors' => [
				'required' => 'Rules.stock.required',
				'is_natural' => 'Rules.stock.is_natural'
			]
		],
		'gambar' => [
			'label' => 'Gambar',
			'rules' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
			'errors' => [
				'uploaded' => 'Anda Belum Mengupload {field}',
				'max_size' => 'Ukuran {field} terlalu besar',
				'is_image' => 'Yang anda pilih bukan {field}',
				'mime_in' => 'Yang anda pilih bukan {field}'
			]
		]
	];

	public $transaksi = [
		'total_harga' => [
			'label' => 'Total Harga',
			'rules' => 'required',
			'errors' => [
				'required' => 'Rules.total_harga.required',
			]
		],
		'alamat' => [
			'label' => 'Stock Barang',
			'rules' => 'required|max_length[50]',
			'errors' => [
				'required' => 'Rules.alamat.required',
				'max_length' => 'Rules.alamat.max_length'
			]
		],
		'ongkir' => [
			'label' => 'Ongkir',
			'rules' => 'required',
			'errors' => [
				'required' => 'Rules.ongkir.required',
			]
		],
	];
}
