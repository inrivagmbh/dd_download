<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "dd_download".
 *
 * Auto generated 09-04-2015 09:15
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'DD Downloads',
	'description' => 'A simple download extension for different filetypes.',
	'category' => 'plugin',
	'version' => '1.1.1',
	'state' => 'beta',
	'uploadfolder' => 1,
	'createDirs' => '',
	'clearcacheonload' => 0,
	'author' => 'Dennis Donzelmann',
	'author_email' => 'info@dennisdonzelmann.de',
	'author_company' => '',
	'constraints' => array(
                'depends' => array(
                        'typo3' => '6.2.0-7.2.99',
                ),
                'conflicts' => array(),
                'suggests' => array()
        ),
);