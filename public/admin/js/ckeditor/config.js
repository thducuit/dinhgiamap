/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	//CK FINDER
	config.filebrowserBrowseUrl = '/public/admin/js/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = '/public/admin/js/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '/public/admin/js/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = '/public/admin/js/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = '/public/admin/js/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '/public/admin/js/kcfinder/upload.php?opener=ckeditor&type=flash';



	config.entities = false;
	config.entities_latin = false;
};
