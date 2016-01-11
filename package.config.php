<?php

return array(
	//The base_dir and archive_file path are combined to point to your tar archive
	//The basic idea is a separate process builds the tar file, then this finds it
	'base_dir'               => __DIR__,
	'archive_files'          => 'Templateria_NewsletterSubscribe.tar',

	//The Magento Connect extension name.  Must be unique on Magento Connect
	//Has no relation to your code module name.  Will be the Connect extension name
	'extension_name'         => 'Templateria_NewsletterSubscribe',
	'extension_version'      => '0.1.0',
	'skip_version_compare'   => false,
	'auto_detect_version'    => false,
	//Where on your local system you'd like to build the files to
	'path_output'            => __DIR__ . '/build',
	'stability'              => 'beta',
	'license'                => 'MIT',
	'channel'                => 'community',

	//Magento Connect information fields.
	'summary'                => 'Plugin para Magento que sincroniza assinantes da Newsletter com uma conta na Templateria.',
	'description'            => 'Plugin para Magento que sincroniza assinantes da Newsletter com uma conta na Templateria.',
	'notes'                  => 'Primeiro release.',
	'author_name'            => 'Pedro Padron',
	'author_user'            => 'ppadron',
	'author_email'           => 'pedro@templateria.com',
	'php_min'                => '5.2.0',
	'php_max'                => '6.0.0'
);
