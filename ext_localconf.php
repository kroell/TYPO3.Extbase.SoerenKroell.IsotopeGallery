<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Skisotopegallery',
	array(
		'IsotopeGallery' => 'gallery, list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'IsotopeGallery' => 'gallery, create, update, delete',
		
	)
);

?>