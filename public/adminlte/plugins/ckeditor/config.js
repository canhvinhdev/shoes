/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = "{{ asset('adminlte/plugins/ckfinder/ckfinder.html')}}",
    config.filebrowserImageBrowseUrl = "{{ asset('adminlte/plugins/ckfinder/ckfinder.html?type=Images')}}",
	config.filebrowserFlashBrowseUrl = "{{ asset('adminlte/plugins/ckfinder/ckfinder.html?type=Flash')}}",
    config.filebrowserUploadUrl = "{{ asset('adminlte/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}",
    config.filebrowserImageUploadUrl = "{{ asset('adminlte/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')}}",
    config.filebrowserFlashUploadUrl = "{{ asset('adminlte/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')}}"
};
