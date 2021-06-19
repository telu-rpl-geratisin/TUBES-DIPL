<?php

namespace Config;

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

	public $login = [
        'username' => [
        	'rules' => 'required',
        	'errors' => [
        		'required' => 'field username wajib diisi'
        	]
        ],
        'password' => [
        	'rules' => 'required',
        	'errors' => [
        		'required' => 'field password wajib diisi'
        	]
        ]
    ];

    public $rating = [
    	'rating' => [
    		'rules' => 'required|regex_match[/^[1-5]$/]',
    		'errors' => [
    			'required' => 'field rating wajib diisi',
    			'regex_match' => 'angka harus salah satu dari 1 - 5'
    		]
    	]
    ];
}
