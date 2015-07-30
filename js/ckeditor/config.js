/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
config.language = 'ua';


config.uiColor = '#1F1E5F'; //цвет рамки
config.toolbar = 'Full'; //функциональность редактора, Basic-минимум, Full-максимум
config.enterMode = CKEDITOR.ENTER_BR;
config.shiftEnterMode = CKEDITOR.ENTER_BR;
config.toolbar_Full = //индивидуальная настройка режима Basic
[
{name: 'basicstyles', items: [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ] },
{name: 'styles', items: [ 'Font','FontSize' ] }, 
{name: 'colors', items: [ 'TextColor','BGColor' ] },  
{name: 'links', items: [ 'Link','Table'] },
{name: 'paragraph', items: [ 'NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] }, 
{name: 'clipboard', items: [ 'Cut','Copy','Paste','-','Undo','Redo' ] },
{name: 'document', items: [ 'Source'] }, 
{name: 'tools', items: [ 'ShowBlocks' ] } 
];

};
