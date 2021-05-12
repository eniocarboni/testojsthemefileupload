<?php


/**
 * @file plugins/themes/TestOjsThemeFileUploadPlugin.inc.php
 *
 * Copyright (c) 2021 Enio Carboni
 * Distributed under the GNU GPL v3
 *
 * @class TestOjsThemeFileUploadPlugin
 * @ingroup plugins_themes_testojsthemefileupload
 *
 * @brief Theme test ojs theme fileupload form
 */
import('lib.pkp.classes.plugins.ThemePlugin');

class TestOjsThemeFileUploadPlugin extends ThemePlugin {
	/**
	 * Initialize the theme's styles, scripts and hooks. This is only run for
	 * the currently active theme.
	 *
	 * @return null
	*/
	public function init() {
		HookRegistry::register ('TemplateManager::display', array($this, 'loadTemplateData'));
		$request = Application::get()->getRequest();
		$dispatcher = $request->getDispatcher();
		$temporaryFileApiUrl = $dispatcher->url($request, ROUTE_API, CONTEXT_ID_ALL, 'temporaryFiles');
		$apiUrl = $dispatcher->url($request, ROUTE_API, CONTEXT_ID_ALL, 'site');
		import('classes.file.PublicFileManager');
		$publicFileManager = new PublicFileManager();
		$baseUrl = $request->getBaseUrl() . '/' . $publicFileManager->getSiteFilesPath();
		$context = $request->getContext();
		$site = $request->getSite();

		$this->setParent('defaultthemeplugin');
		$this->addStyle('testojsthemefileupload-stylesheet', 'styles/testojsthemefileupload.less');
		$this->addScript('testojsthemefileupload-script', 'js/testojsthemefileupload.js');
		// Remove parent option valid only for journal if in global site theme
		if (! $context) {
			$this->removeOption('useHomepageImageAsHeader');
			$this->removeOption('showDescriptionInJournalIndex');
		}
		$this->addOption('headerImg','FieldUploadImage',array(
			'label' => __('plugins.themes.testojsthemefileupload.option.headerImg.label'),
			'description' => __('plugins.themes.testojsthemefileupload.option.headerImg.description'),
			'value' => $site->getData('headerImg'),
			'isMultilingual' => False,
			'baseUrl' => $baseUrl,
			'options' => [
				'url' => $temporaryFileApiUrl,
			],
		));
		/*
		 * ... test headerImg ...
		 *
		 */
	}

	public function loadTemplateData($hookName, $args) {
		// Retrieve the TemplateManager and the template filename
		$templateMgr = $args[0];
		// this templete (top level template): i.e. frontend/pages/article.tpl
		$template = $args[1];
		return false;
	}
	/**
	 * Get the display name of this plugin
	 * @return string
	 */
	function getDisplayName() {
		return __('plugins.themes.testojsthemefileupload.name');
	}

	/**
	 * Get the description of this plugin
	 * @return string
	 */
	function getDescription() {
		return __('plugins.themes.testojsthemefileupload.description');
	}
}

?>
