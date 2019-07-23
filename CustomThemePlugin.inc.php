<?php

/**
 * @file plugins/themes/default/DefaultChildThemePlugin.inc.php
 *
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
		
		// Journal Description Position Option
		$this->addOption('positionJournalDescription', 'radio', array(
			'label' => 'plugins.themes.custom.option.positionJournalDescriptionLabel',
			'description' => 'plugins.themes.custom.option.positionJournalDescriptionDescription',
			'options' => array(
				1 => 'plugins.themes.custom.option.positionJournalDescriptionAbove',
				2 => 'plugins.themes.custom.option.positionJournalDescriptionBelow',
				3 => 'plugins.themes.custom.option.positionJournalDescriptionOff'
			)
		));			
		$positionJournalDescription = $this->getOption('positionJournalDescription');
				
		$this->addOption('colourHeading', 'colour', array(
		  'label' => 'plugins.themes.custom.option.colourHeadingLabel',
		  'description' => 'plugins.themes.custom.option.colourHeadingDescription',
		  'default' => '#fff'
		));		
		$colourHeading = $this->getOption('colourHeading');
		
		$this->addOption('colourFooter', 'colour', array(
		  'label' => 'plugins.themes.custom.option.colourFooterLabel',
		  'description' => 'plugins.themes.custom.option.colourFooterDescription',
		  'default' => '#ddd'
		));		
		$colourFooter = $this->getOption('colourFooter');		
		
		$this->addOption('colourLinks', 'colour', array(
		  'label' => 'plugins.themes.custom.option.colourLinksLabel',
		  'description' => 'plugins.themes.custom.option.colourLinksDescription',
		  'default' => '#009de5;'
		));		
		$colourLinks = $this->getOption('colourLinks');		
		
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

		// Journal Body font
		$this->addOption('fontBody', 'radio', array(
		  'label' => 'plugins.themes.custom.option.fontBodyLabel',
		  'description' => 'plugins.themes.custom.option.fontBodyDescription',
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
		
		// Borders
		$this->addOption('typeBorder', 'radio', array(
			'label' => 'plugins.themes.custom.option.typeBorderLabel',
			'description' => 'plugins.themes.custom.option.typeBorderDescription',
			'options' => array(
				1 => 'plugins.themes.custom.option.typeBorderOn',
				0 => 'plugins.themes.custom.option.typeBorderOff'
			)
		));			
		$typeBorder = $this->getOption('typeBorder');
		
////////////////////////////////////////////////////////////////////////////////////		
				
		//$this->removeOption('baseColour');
		$this->removeOption('typography');	
		$this->modifyStyle('stylesheet', array('addLess' => array('styles/custom.less')));
		$this->addStyle('custom', 'styles/custom.less');
		
		$additionalLessVariables = array();	
		// todo: warum muss man diese Verrenkung machen?
		if ($positionJournalDescription==1) {
			$additionalLessVariables[] = '@positionJournalDescription: 1;';		
		} else if ($positionJournalDescription==2) {
			$additionalLessVariables[] = '@positionJournalDescription: 2;';		
		} else {
			$additionalLessVariables[] = '@positionJournalDescription: 3;';		
		}		
 $fontHeadline = $this->getOption('fontHeadline');
    //ChromePhp::log('$headlineFontOpt: ' . $headlineFontOpt);
    if (empty($fontHeadline) || $fontHeadline === 'MerriweatherSans') {
      $additionalLessVariables[] = '@fontHeadline: \'MerriweatherSans\';';
    } elseif ($fontHeadline === 'Georgia') {
      $additionalLessVariables[] = '@fontHeadline: \'Georgia\';';
    } elseif ($fontHeadline === 'NotoSans') {
      $additionalLessVariables[] = '@fontHeadline: \'NotoSans\';';
    } elseif ($fontHeadline === 'NotoSerif') {
      $additionalLessVariables[] = '@fontHeadline: \'NotoSerif\';';
    } elseif ($fontHeadline === 'FiraSans') {
      $additionalLessVariables[] = '@fontHeadline: \'FiraSans\';';
    } elseif ($fontHeadline === 'SourceSansPro') {
      $additionalLessVariables[] = '@fontHeadline: \'SourceSansPro\';';
    } elseif ($fontHeadline === 'Merriweather') {
      $additionalLessVariables[] = '@fontHeadline: \'Merriweather\';';
    } else {
      $additionalLessVariables[] = '@fontHeadline: \'Arial\';';
    }
    $fontBody = $this->getOption('fontBody');
    //ChromePhp::log('$bodyFontOpt: ' . $bodyFontOpt);
    if (empty($fontBody) || $fontBody === 'MerriweatherSans') {
      $additionalLessVariables[] = '@fontBody: \'MerriweatherSans\';';
    } elseif ($fontBody === 'Georgia') {
      $additionalLessVariables[] = '@fontBody: \'Georgia\';';
    } elseif ($fontBody === 'NotoSans') {
      $additionalLessVariables[] = '@fontBody: \'NotoSans\';';
    } elseif ($fontBody === 'NotoSerif') {
      $additionalLessVariables[] = '@fontBody: \'NotoSerif\';';
    } elseif ($fontBody === 'FiraSans') {
      $additionalLessVariables[] = '@fontBody: \'FiraSans\';';
    } elseif ($fontBody === 'SourceSansPro') {
      $additionalLessVariables[] = '@fontBody: \'SourceSansPro\';';
    } elseif ($fontBody === 'Merriweather') {
      $additionalLessVariables[] = '@fontBody: \'Merriweather\';';
    } else {
      $additionalLessVariables[] = '@fontBody: \'Arial\';';
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
		$additionalLessVariables[] = '@font: @fontBody;';	
		$additionalLessVariables[] = '@font-heading: @fontHeadline;';
		$additionalLessVariables[] = '@colour-footer: ' . $colourFooter . ';';
		
		if ($typeBorder==0) {
			$additionalLessVariables[] = '@bg-border: transparent;';	
		}
	
		if (!empty($additionalLessVariables)) {
			$this->modifyStyle('stylesheet', array('addLessVariables' => join($additionalLessVariables)));
		}
	
		//HookRegistry::register('TemplateManager::include', array(&$this, 'handleIncludeTemplate'));
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
