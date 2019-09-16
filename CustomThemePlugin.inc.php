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
		
		$request = Application::getRequest();
		$journal = $request->getJournal();
		
		$this->setParent('defaultthemeplugin');

		$this->removeOption('typography');

		// custom heading / hero claim
		$this->addOption('heading', 'text', array(
			'label' => 'plugins.themes.custom.option.headingLabel',
			'description' => 'plugins.themes.custom.option.headingDescription'
		));

		// colour of custom heading / hero claim
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

		$this->addOption('colourHeadlines', 'colour', array(
			'label' => 'plugins.themes.custom.option.colourHeadlinesLabel',
			'description' => 'plugins.themes.custom.option.colourHeadlinesDescription',
			'default' => '#2c2c2c',
		));
		$colourHeadlines = $this->getOption('colourHeadlines');

		//Font Headlines
		$this->addOption('fontHeadlines', 'text', array(
			'label' => 'plugins.themes.custom.option.fontHeadlinesLabel',
			'description' => 'plugins.themes.custom.option.fontHeadlinesDescription'
		));
		$fontHeadlines = $this->getOption('fontHeadlines');

		//Font Body
		$this->addOption('fontBody', 'text', array(
			'label' => 'plugins.themes.custom.option.fontBodyLabel',
			'description' => 'plugins.themes.custom.option.fontBodyDescription'
		));
		$fontBody = $this->getOption('fontBody');

		//Font Size (base)
		$this->addOption('fontBase', 'text', array(
			'label' => 'plugins.themes.custom.option.fontBaseLabel',
			'description' => 'plugins.themes.custom.option.fontBaseDescription',
			'default' => '14px',			
		));
		$fontBase = $this->getOption('fontBase');

		// Borders
		$this->addOption('typeBorder', 'radio', array(
			'label' => 'plugins.themes.custom.option.typeBorderLabel',
			'description' => 'plugins.themes.custom.option.typeBorderDescription',
			'options' => array(
				0 => 'plugins.themes.custom.option.typeBorderOn',
				1 => 'plugins.themes.custom.option.typeBorderVertical',
				2 => 'plugins.themes.custom.option.typeBorderHorizontal',				
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

		// Hero Header
		$this->addOption('heroHeader', 'radio', array(
			'label' => 'plugins.themes.custom.option.heroHeaderLabel',
			'description' => 'plugins.themes.custom.option.heroHeaderDescription',
			'options' => array(
				0 => 'plugins.themes.custom.option.heroHeaderOff',
				1 => 'plugins.themes.custom.option.heroHeaderOn',
			)
		));			
		$heroHeader = $this->getOption('heroHeader');			

////////////////////////////////////////////////////////////////////////////////////		

		$additionalLessVariables = array();	

		$additionalLessVariables[] = '@custom-position-journaldescription:' . $positionJournalDescription . ';';
		$additionalLessVariables[] = '@custom-position-sidebar:' . $positionSidebar . ';';
		$additionalLessVariables[] = '@custom-header-mobile:' . $headerMobile . ';';
		$additionalLessVariables[] = '@bg-base:' . $this->getOption('baseColour') . ';';
		$additionalLessVariables[] = '@primary:' . $colourLinks . ';';
		$additionalLessVariables[] = '@custom-colour-heading: ' . $colourHeading . ';';
		$additionalLessVariables[] = '@text: ' . $colourText . ';';
		$additionalLessVariables[] = '@custom-colour-headlines: ' . $colourHeadlines . ';';		
		$additionalLessVariables[] = '@custom-colour-footer: ' . $colourFooter . ';';
		$additionalLessVariables[] = '@custom-hero-header: ' . $heroHeader . ';';
		$additionalLessVariables[] = '@custom-hero-height: 300px;';
		$additionalLessVariables[] = '@custom-font-headlines: ' . $fontHeadlines . ';';
		$additionalLessVariables[] = '@custom-enabled-announcements: ' . (int)($journal->getSetting('enableAnnouncements')) . ';';
		
		$homepageImage = intval(!(is_null($journal->getLocalizedSetting('homepageImage'))) && !$heroHeader);
		$additionalLessVariables[] = '@homepage-image: '.$homepageImage.';';				
			
		// text color for light headers = body text colour		
		if (!$this->isColourDark($this->getOption('baseColour'))) {
			$additionalLessVariables[] = '@text-bg-base: @text;';
		}
		
		// font base size: only digits allowed
		if (ctype_digit($fontBase) && intval($fontBase) > 0 ) {
			$additionalLessVariables[] = '@custom-font-base: ' . $fontBase  . 'px;';
		} else {
			$additionalLessVariables[] = '@custom-font-base: 14px;';
		}

		if (!$this->isColourDark($colourFooter)) {
			$additionalLessVariables[] = '@custom-colour-text-footer: @text;';
		} else {
			$additionalLessVariables[] = '@custom-colour-text-footer: #fff;';			
		}

		if ($typeBorder==1) {
			$additionalLessVariables[] = '@custom-type-border: 1;';
			$additionalLessVariables[] = '@bg-border: transparent;';			
		} else if ($typeBorder==2) {
			$additionalLessVariables[] = '@custom-type-border: 2;';
		} else {
			$additionalLessVariables[] = '@custom-type-border: 0;';			
		}
		
		if ($fontBody=='Arial' || $fontBody=='Georgia'|| $fontBody=='NotoSans' ||
			$fontBody=='NotoSerif'|| $fontBody=='FiraSans'|| $fontBody=='SourceSansPro' ||
			$fontBody=='Merriweather'|| $fontBody=='MerriweatherSans'|| $fontBody=='LinuxLibertine' ||
			$fontBody=='LinuxBiolinum') {
			$additionalLessVariables[] = '@font: ' . $fontBody . ';';				
		}
		
		if ($fontHeadlines=='Arial' || $fontHeadlines=='Georgia'|| $fontHeadlines=='NotoSans' ||
			$fontHeadlines=='NotoSerif'|| $fontHeadlines=='FiraSans'|| $fontHeadlines=='SourceSansPro' ||
			$fontHeadlines=='Merriweather'|| $fontHeadlines=='MerriweatherSans'|| $fontHeadlines=='LinuxLibertine' ||
			$fontHeadlines=='LinuxBiolinum') {
			$additionalLessVariables[] = '@font-heading: ' . $fontHeadlines . ';';				
		}
		
		$this->modifyStyle('stylesheet', array('addLess' => array('styles/custom.less')));
		//$this->addStyle('custom', 'styles/custom.less');
		if (!empty($additionalLessVariables)) {
			$this->modifyStyle('stylesheet', array('addLessVariables' => join($additionalLessVariables)));
		}
		$this->addStyle("htmlStyle", "styles/htmlGalleys.css", array('contexts' => 'htmlGalley'));
		// Get extra data for templates
		HookRegistry::register('TemplateManager::display', array($this, 'loadTemplateData'));		
	}
	
	/**
	 * Load custom data for templates
	 */
	public function loadTemplateData($hookName, $args) {
		$request = Application::getRequest();
		$journal = $request->getJournal();
		//name,uploadName,width,height,dateUploaded,altText
		$homepageImage = $journal->getLocalizedSetting('homepageImage');
		$templateMgr = $args[0];
		$templateMgr->assign(array(
			'customHeading' => $this->getOption('heading'),
			'heroHeader' => $this->getOption('heroHeader'),
			'homepageImageName' => $homepageImage['uploadName']
		));
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
