<?php

/**
 * @file plugins/themes/default/DefaultChildThemePlugin.inc.php
 *
 * Copyright (c) 2019 Freie Universität Berlin
 * Copyright (c) 2014-2016 Simon Fraser University Library
 * Copyright (c) 2003-2016 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class DefaultChildThemePlugin
 * @ingroup plugins_themes_default
 *
 * @brief Default theme
 */
import('lib.pkp.classes.plugins.ThemePlugin');

class CustomThemePlugin extends ThemePlugin {

	/**
	 * Initialize the theme's styles, scripts and hooks. This is only run for
	 * the currently active theme.
	 *
	 * @return null
	 */
	public function init() {

		$this->setParent('defaultthemeplugin');
		
		//heading
		$this->addOption('heading', 'text', array(
			'label' => 'plugins.themes.custom.option.headingLabel',
			'description' => 'plugins.themes.custom.option.headingDescription'
		));		
				
		$this->addOption('colourHeading', 'colour', array(
		  'label' => 'plugins.themes.custom.option.colourHeadingLabel',
		  'description' => 'plugins.themes.custom.option.colourHeadingDescription',
		  'default' => '#ffffff'
		));		
		$colourHeading = $this->getOption('colourHeading');
		
		// Mobile Header: logo or custom title?
		$this->addOption('headerMobile', 'radio', array(
			'label' => 'plugins.themes.custom.option.headerMobileLabel',
			'description' => 'plugins.themes.custom.option.headerMobileDescription',
			'options' => array(
				0 => 'plugins.themes.custom.option.headerMobileLogo',
				1 => 'plugins.themes.custom.option.headerMobileTitle'
			)
		));			
		$headerMobile = $this->getOption('headerMobile');	
		
		// Journal Description Position Option
		$this->addOption('positionJournalDescription', 'radio', array(
			'label' => 'plugins.themes.custom.option.positionJournalDescriptionLabel',
			'description' => 'plugins.themes.custom.option.positionJournalDescriptionDescription',
			'options' => array(
				0 => 'plugins.themes.custom.option.positionJournalDescriptionAbove',
				1 => 'plugins.themes.custom.option.positionJournalDescriptionBelow',
				2 => 'plugins.themes.custom.option.positionJournalDescriptionOff'
			)
		));			
		$positionJournalDescription = $this->getOption('positionJournalDescription');		
		
		$this->addOption('colourFooter', 'colour', array(
			'label' => 'plugins.themes.custom.option.colourFooterLabel',
			'description' => 'plugins.themes.custom.option.colourFooterDescription',
			'default' => '#bfbfbf',
		));
		$colourFooter = $this->getOption('colourFooter');	
		
		$this->addOption('colourLinks', 'colour', array(
			'label' => 'plugins.themes.custom.option.colourLinksLabel',
			'description' => 'plugins.themes.custom.option.colourLinksDescription',
			'default' => '#009de5',
		));		
		$colourLinks = $this->getOption('colourLinks');

		$this->addOption('colourText', 'colour', array(
			'label' => 'plugins.themes.custom.option.colourTextLabel',
			'description' => 'plugins.themes.custom.option.colourTextDescription',
			'default' => '#2c2c2c',
		));
		$colourText = $this->getOption('colourText');

		$this->addOption('colourHeadings', 'colour', array(
			'label' => 'plugins.themes.custom.option.colourHeadingsLabel',
			'description' => 'plugins.themes.custom.option.colourHeadingsDescription',
			'default' => '#2c2c2c',
		));
		$colourHeadings = $this->getOption('colourHeadings');
		
		// Journal Headling font
		$this->addOption('fontHeadline', 'radio', array(
			'label' => 'plugins.themes.custom.option.fontHeadlineLabel',
			'description' => 'plugins.themes.custom.option.fontHeadlineDescription',
			'default' => 'NotoSans',	  
			'options' => array(
				'Arial' => 'plugins.themes.custom.option.FontArial',
				'Georgia' => 'plugins.themes.custom.option.FontGeorgia',
				'NotoSans' => 'plugins.themes.custom.option.FontNotoSans',
				'NotoSerif' => 'plugins.themes.custom.option.FontNotoSerif',
				'FiraSans' => 'plugins.themes.custom.option.FontFiraSans',
				'SourceSansPro' => 'plugins.themes.custom.option.FontSourceSansPro',
				'Merriweather' => 'plugins.themes.custom.option.FontMerriweather',
				'MerriweatherSans' => 'plugins.themes.custom.option.FontMerriweatherSans'
			)
		));
		$fontHeadline = $this->getOption('fontHeadline');

		// Journal Body font
		$this->addOption('fontBody', 'radio', array(
			'label' => 'plugins.themes.custom.option.fontBodyLabel',
			'description' => 'plugins.themes.custom.option.fontBodyDescription',
			'default' => 'NotoSans',			
			'options' => array(
				'Arial' => 'plugins.themes.custom.option.FontArial',
				'Georgia' => 'plugins.themes.custom.option.FontGeorgia',
				'NotoSans' => 'plugins.themes.custom.option.FontNotoSans',
				'NotoSerif' => 'plugins.themes.custom.option.FontNotoSerif',
				'FiraSans' => 'plugins.themes.custom.option.FontFiraSans',
				'SourceSansPro' => 'plugins.themes.custom.option.FontSourceSansPro',
				'Merriweather' => 'plugins.themes.custom.option.FontMerriweather',
				'MerriweatherSans' => 'plugins.themes.custom.option.FontMerriweatherSans'
			)
		));		
		$fontBody = $this->getOption('fontBody');

		// Borders
		$this->addOption('typeBorder', 'radio', array(
			'label' => 'plugins.themes.custom.option.typeBorderLabel',
			'description' => 'plugins.themes.custom.option.typeBorderDescription',
			'options' => array(
				0 => 'plugins.themes.custom.option.typeBorderOn',
				1 => 'plugins.themes.custom.option.typeBorderOff'
			)
		));			
		$typeBorder = $this->getOption('typeBorder');

		// Postion Sidebar
		$this->addOption('positionSidebar', 'radio', array(
			'label' => 'plugins.themes.custom.option.positionSidebarLabel',
			'description' => 'plugins.themes.custom.option.positionSidebarDescription',
			'options' => array(
				0 => 'plugins.themes.custom.option.positionSidebarRight',
				1 => 'plugins.themes.custom.option.positionSidebarLeft'
			)
		));
		$positionSidebar = $this->getOption('positionSidebar');		

////////////////////////////////////////////////////////////////////////////////////		

		//$this->removeOption('baseColour');
		$this->removeOption('typography');	
		$this->modifyStyle('stylesheet', array('addLess' => array('styles/custom.less')));
		$this->addStyle('custom', 'styles/custom.less');
		
		$additionalLessVariables = array();	
		// todo: warum muss man diese Verrenkung machen?
		if ($positionJournalDescription==0) {
			$additionalLessVariables[] = '@positionJournalDescription: 0;';		
		} else if ($positionJournalDescription==1) {
			$additionalLessVariables[] = '@positionJournalDescription: 1;';		
		} else {
			$additionalLessVariables[] = '@positionJournalDescription: 2;';		
		}

		if ($positionSidebar==0) {
			$additionalLessVariables[] = '@positionSidebar: 0;';				
		} else {
			$additionalLessVariables[] = '@positionSidebar: 1;';		
		}

		if ($headerMobile==0) {
			$additionalLessVariables[] = '@headerMobile: 0;';				
		} else {
			$additionalLessVariables[] = '@headerMobile: 1;';		
		}

		//ChromePhp::log('$bodyFontOpt: ' . $bodyFontOpt);
		if (empty($fontBody) || $fontBody === 'MerriweatherSans') {
			$additionalLessVariables[] = '@font: \'MerriweatherSans\';';
		} elseif ($fontBody === 'Georgia') {
			$additionalLessVariables[] = '@font: \'Georgia\';';
		} elseif ($fontBody === 'NotoSans') {
			$additionalLessVariables[] = '@font: \'NotoSans\';';
		} elseif ($fontBody === 'NotoSerif') {
			$additionalLessVariables[] = '@font: \'NotoSerif\';';
		} elseif ($fontBody === 'FiraSans') {
			$additionalLessVariables[] = '@font: \'FiraSans\';';
		} elseif ($fontBody === 'SourceSansPro') {
			$additionalLessVariables[] = '@font: \'SourceSansPro\';';
		} elseif ($fontBody === 'Merriweather') {
			$additionalLessVariables[] = '@font: \'Merriweather\';';
		} elseif ($fontBody === 'Arial')  {
			$additionalLessVariables[] = '@font: \'Arial\';';
		} else {
			$additionalLessVariables[] = '@font: \'NotoSans\';';			
		}

		//ChromePhp::log('$headlineFontOpt: ' . $headlineFontOpt);
		if (empty($fontHeadline) || $fontHeadline === 'MerriweatherSans') {
			$additionalLessVariables[] = '@font-heading: \'MerriweatherSans\';';
		} elseif ($fontHeadline === 'Georgia') {
			$additionalLessVariables[] = '@font-heading: \'Georgia\';';
		} elseif ($fontHeadline === 'NotoSans') {
			$additionalLessVariables[] = '@font-heading: \'NotoSans\';';
		} elseif ($fontHeadline === 'NotoSerif') {
			$additionalLessVariables[] = '@font-heading: \'NotoSerif\';';
		} elseif ($fontHeadline === 'FiraSans') {
			$additionalLessVariables[] = '@font-heading: \'FiraSans\';';
		} elseif ($fontHeadline === 'SourceSansPro') {
			$additionalLessVariables[] = '@font-heading: \'SourceSansPro\';';
		} elseif ($fontHeadline === 'Merriweather') {
			$additionalLessVariables[] = '@font-heading: \'Merriweather\';';
		} elseif ($fontHeadline === 'Arial') {
			$additionalLessVariables[] = '@font-heading: \'Arial\';';
		} else {
			$additionalLessVariables[] = '@font-heading: \'NotoSans\';';			
		}

		// Update colour based on theme option
		$additionalLessVariables[] = '@bg-base:' . $this->getOption('baseColour') . ';';		
		if ($this->getOption('baseColour') !== '#1E6292') {
			if (!$this->isColourDark($this->getOption('baseColour'))) {
				$additionalLessVariables[] = '@text-bg-base:rgba(0,0,0,0.84);';
			}
		}

		$additionalLessVariables[] = '@primary:' . $colourLinks . ';';
		$additionalLessVariables[] = '@colour-heading: ' . $colourHeading . ';';
		$additionalLessVariables[] = '@text: ' . $colourText . ';';	
		$additionalLessVariables[] = '@colourHeadings: ' . $colourHeadings . ';';					
		$additionalLessVariables[] = '@colour-footer: ' . $colourFooter . ';';

		if ($this->isColourDark($colourFooter)) {
			$additionalLessVariables[] = '@footer-dark: 1;';
		} else {
			$additionalLessVariables[] = '@footer-dark: 0;';			
		}
		
		if ($typeBorder==1) {
			$additionalLessVariables[] = '@bg-border: transparent;';	
		}
	
		if (!empty($additionalLessVariables)) {
			$this->modifyStyle('stylesheet', array('addLessVariables' => join($additionalLessVariables)));
		}

		// Get extra data for templates
		HookRegistry::register ('TemplateManager::display', array($this, 'loadTemplateData'));		
	}
	
	/**
	 * Load custom data for templates
	 *
	 * @param string $hookName
	 * @param array $args [
	 *		@option TemplateManager
	 *		@option string Template file requested
	 *		@option string
	 *		@option string
	 *		@option string output HTML
	 * ]
	 */
	public function loadTemplateData($hookName, $args) {
		$templateMgr = $args[0];
		//$request = Application::getRequest();
		//$context = $request->getContext();
		//if (!defined('SESSION_DISABLE_INIT')) {
			// Get possible locales
			/*if ($context) {
				$locales = $context->getSupportedLocaleNames();
			} else {
				$locales = $request->getSite()->getSupportedLocaleNames();
			}*/
			// Load login form
			/*$loginUrl = $request->url(null, 'login', 'signIn');
			if (Config::getVar('security', 'force_login_ssl')) {
				$loginUrl = PKPString::regexp_replace('/^http:/', 'https:', $loginUrl);
			}
			$orcidImage = $this->getPluginPath() . '/templates/images/orcid.png';*/
			$templateMgr->assign(array(
				//'journalDescrition' =>  $context->getDescription(null),
				'customHeading' => $this->getOption('heading')
			));
		//}
	}

	/**
	 * Get the display name of this plugin
	 * @return string
	 */
	function getDisplayName() {
		return __('plugins.themes.custom.name');
	}

	/**
	 * Get the description of this plugin
	 * @return string
	 */
	function getDescription() {
		return __('plugins.themes.custom.description');
	}
}

?>
