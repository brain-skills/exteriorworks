<?php
/*
=====================================================
 DataLife Engine - by SoftNews Media Group 
-----------------------------------------------------
 https://dle-news.ru/
-----------------------------------------------------
 Copyright (c) 2004-2023 SoftNews Media Group
=====================================================
 This code is protected by copyright
=====================================================
 File: newsletter.php
-----------------------------------------------------
 Use: WYSIWYG for newsletter
=====================================================
*/

if( !defined( 'DATALIFEENGINE' ) ) {
	header( "HTTP/1.1 403 Forbidden" );
	header ( 'Location: ../../' );
	die( "Hacking attempt!" );
}

if($config['bbimages_in_wysiwyg']) {
	$implugin = 'dleimage';
} else $implugin = 'image';

if( @file_exists( ROOT_DIR . '/templates/'. $config['skin'].'/editor.css' ) ) {
	
		$editor_css = "templates/{$config['skin']}/editor.css?v={$config['cache_id']}";
		
} else $editor_css = "engine/editor/css/content.css?v={$config['cache_id']}";

echo <<<HTML
<script>
$(function(){

	tinyMCE.baseURL = 'engine/editor/jscripts/tiny_mce';
	tinyMCE.suffix = '.min';

	if(dle_theme === null) dle_theme = '';

	var body_class = dle_theme;
	var height = 400 * getBaseSize();
	if( height > 600 ) height = 600;

	if ( $('html').attr('class') ) {
		body_class = body_class + ' ' + $('html').attr('class');
	}

	tinymce.init({
		selector: 'textarea.wysiwygeditor',
		language : "{$lang['language_code']}",
		directionality: '{$lang['direction']}',
		element_format : 'html',
		body_class: body_class,
		skin: dle_theme == 'dle_theme_dark' ? 'oxide-dark' : 'oxide',
		
		width : "100%",
		height : height,

		deprecation_warnings: false,
		promotion: false,
		cache_suffix: '?v={$config['cache_id']}',

		plugins: "fullscreen advlist autolink lists link image charmap anchor searchreplace visualblocks visualchars nonbreaking table codemirror dlebutton codesample quickbars autosave wordcount pagebreak toc",

		relative_urls : false,
		convert_urls : false,
		remove_script_host : false,
		verify_html: false,
		nonbreaking_force_tab: true,
		branding: false,
		link_default_target: '_blank',
		browser_spellcheck: true,
		editable_class: 'contenteditable',
		noneditable_class: 'noncontenteditable',
		contextmenu: 'image table lists',
		paste_as_text: true,

		image_advtab: true,
		image_caption: true,
		image_dimensions: false,
		image_uploadtab: false,
		paste_data_images: false,

		paste_data_images: false,

		draggable_modal: true,

		menubar: false,

  		toolbar: 'fontformatting pasteformat| bold italic underline strikethrough | align | bullist numlist | link dleleech | image dleemo | table hr charmap | forecolor backcolor | dletypo removeformat | undo redo | fullscreen code',
		
		mobile: {
			plugins: 'link image dlebutton codemirror',
			toolbar: 'bold italic underline alignleft aligncenter alignright link dleleech dlequote'
		},

		toolbar_groups: {
		  
			fontformatting: {
			  icon: 'change-case',
			  tooltip: 'Formatting',
			  items: 'blocks styles fontfamily fontsizeinput lineheight'
			},

			align: {
			  icon: 'align-center',
			  tooltip: 'Formatting',
			  items: 'alignleft aligncenter alignright alignjustify'
			},

			pasteformat: {
			  icon: 'paste',
			  tooltip: 'Paste',
			  items: 'copy cut paste pastetext'
			}
		},

		block_formats: 'Tag (p)=p;Tag (div)=div;Header 1=h1;Header 2=h2;Header 3=h3;Header 4=h4;Header 5=h5;Header 6=h6;',
		style_formats: [
			{ title: 'Information Block', block: 'div', wrapper: true, styles: { 'color': '#333333', 'border': 'solid 1px #00897B', 'padding': '0.625rem', 'background-color': '#E0F2F1', 'box-shadow': 'rgb(0 0 0 / 24%) 0px 1px 2px' } },
			{ title: 'Warning Block', block: 'div', wrapper: true, styles: { 'border': 'solid 1px #FF9800', 'padding': '0.625rem', 'background-color': '#FFF3E0', 'color': '#aa3510', 'box-shadow': 'rgb(0 0 0 / 24%) 0px 1px 2px' } },
			{ title: 'Error Block', block: 'div', wrapper: true, styles: { 'border': 'solid 1px #FF5722', 'padding': '0.625rem', 'background-color': '#FBE9E7', 'color': '#9c1f1f', 'box-shadow': 'rgb(0 0 0 / 24%) 0px 1px 2px' } },
			{ title: 'Borders', block: 'div', wrapper: true, styles: { 'border': 'solid 1px #ccc', 'padding': '0.625rem' } },
			{ title: 'Borders top and bottom', block: 'div', wrapper: true, styles: { 'border-top': 'solid 1px #ccc', 'border-bottom': 'solid 1px #ccc', 'padding': '10px 0' } },
			{ title: 'Use a shadow', block: 'div', styles: { 'box-shadow': '0 5px 12px rgba(126,142,177,0.2)' } },
			{ title: 'Increased letter spacing', inline: 'span', styles: { 'letter-spacing': '1px' } },
			{ title: 'Сapital letters', inline: 'span', styles: { 'text-transform': 'uppercase' } },
			{ title: 'Gray background', block: 'div', wrapper: false, styles: { 'color': '#fff', 'background-color': '#607D8B', 'padding': '0.625rem' } },
			{ title: 'Brown background', block: 'div', wrapper: false, styles: { 'color': '#fff', 'background-color': '#795548', 'padding': '0.625rem' } },
			{ title: 'Blue background', block: 'div', wrapper: false, styles: { 'color': '#104d92', 'background-color': '#E3F2FD', 'padding': '0.625rem' } },
			{ title: 'Green background', block: 'div', wrapper: false, styles: { 'color': '#fff', 'background-color': '#009688', 'padding': '0.625rem' } },
		],

		quickbars_insert_toolbar: false,
		quickbars_selection_toolbar: 'bold italic underline quicklink | forecolor backcolor styles blocks fontsizeinput lineheight',
		quickbars_image_toolbar: 'alignleft aligncenter alignright | image link',

		autosave_ask_before_unload: true,
		autosave_interval: '10s',
		autosave_prefix: 'dle-editor-{path}{query}-{id}-',
		autosave_restore_when_empty: false,
		autosave_retention: '10m',
  
		formats: {
		  bold: {inline: 'b'},  
		  italic: {inline: 'i'},
		  underline: {inline: 'u', exact : true},  
		  strikethrough: {inline: 's', exact : true}
		},
		
		dle_root : "",
		dle_upload_area : "",
		dle_upload_user : "",
		dle_upload_news : "",

		content_css : "{$editor_css}"

	});

});
</script>
    <div class="editor-panel"><textarea id="message" name="message" class="wysiwygeditor" style="width:100%;height:300px;"></textarea></div>
HTML;

?>