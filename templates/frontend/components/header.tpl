{**
 * lib/pkp/templates/frontend/components/header.tpl
 *
 * Copyright (c) 2014-2019 Simon Fraser University
 * Copyright (c) 2003-2019 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @brief Common frontend site header.
 *
 * @uses $isFullWidth bool Should this page be displayed without sidebars? This
 *       represents a page-level override, and doesn't indicate whether or not
 *       sidebars have been configured for thesite.
 *}
{strip}
	{* Determine whether a logo or title string is being displayed *}
	{assign var="showingLogo" value=true}
	{if $displayPageHeaderTitle && !$displayPageHeaderLogo && is_string($displayPageHeaderTitle)}
		{assign var="showingLogo" value=false}
	{/if}
{/strip}
<!DOCTYPE html>
<html lang="{$currentLocale|replace:"_":"-"}" xml:lang="{$currentLocale|replace:"_":"-"}">
{if !$pageTitleTranslated}{capture assign="pageTitleTranslated"}{translate key=$pageTitle}{/capture}{/if}
{include file="frontend/components/headerHead.tpl"}
<body class="pkp_page_{$requestedPage|escape|default:"index"} pkp_op_{$requestedOp|escape|default:"index"}{if $showingLogo} has_site_logo{/if}" dir="{$currentLocaleLangDir|escape|default:"ltr"}">

	<div class="cmp_skip_to_content">
		<a href="#pkp_content_main">{translate key="navigation.skip.main"}</a>
		<a href="#pkp_content_nav">{translate key="navigation.skip.nav"}</a>
		<a href="#pkp_content_footer">{translate key="navigation.skip.footer"}</a>
	</div>
	<div class="pkp_structure_page">
			
		{* Header *}
		<header class="pkp_structure_head" id="headerNavigationContainer" role="banner">

			{if $heroHeader} 
				<div class="custom_hero_header_wrapper">
				<div class="pkp_head_wrapper">												
				<div class="pkp_site_name_wrapper custom_site_name_wrapper ">
					{* Logo or site title. Only use <h1> heading on the homepage.
					   Otherwise that should go to the page title. *}
					{if $requestedOp == 'index'}
						<h1 class="pkp_site_name">
					{else}
						<div class="pkp_site_name">
					{/if}
						{capture assign="homeUrl"}
							{if $currentContext && $multipleContexts}
								{url page="index" router=$smarty.const.ROUTE_PAGE}
							{else}
								{url context="index" router=$smarty.const.ROUTE_PAGE}
							{/if}
						{/capture}
						{if $displayPageHeaderLogo && is_array($displayPageHeaderLogo)}
							<a href="{$homeUrl}" class="is_img">
								<img src="{$publicFilesDir}/{$displayPageHeaderLogo.uploadName|escape:"url"}" width="{$displayPageHeaderLogo.width|escape}" height="{$displayPageHeaderLogo.height|escape}" {if $displayPageHeaderLogo.altText != ''}alt="{$displayPageHeaderLogo.altText|escape}"{else}alt="{translate key="common.pageHeaderLogo.altText"}"{/if} />
							</a>
						{elseif $displayPageHeaderTitle && !$displayPageHeaderLogo && is_string($displayPageHeaderTitle)}
							<a href="{$homeUrl}" class="is_text">{$displayPageHeaderTitle}</a>
						{elseif $displayPageHeaderTitle && !$displayPageHeaderLogo && is_array($displayPageHeaderTitle)}
							<a href="{$homeUrl}" class="is_img">
								<img src="{$publicFilesDir}/{$displayPageHeaderTitle.uploadName|escape:"url"}" alt="{$displayPageHeaderTitle.altText|escape}" width="{$displayPageHeaderTitle.width|escape}" height="{$displayPageHeaderTitle.height|escape}" />
							</a>
						{else}
							<a href="{$homeUrl}" class="is_img">
								<img src="{$baseUrl}/templates/images/structure/logo.png" alt="{$applicationName|escape}" title="{$applicationName|escape}" width="180" height="90" />
							</a>
						{/if}
					{if $requestedOp == 'index'}
						</h1>
					{else}
						</div>
					{/if}
				</div>
				</div>			

				{assign var="homepageImageUrl" value="{$publicFilesDir}/{$homepageImageName}"}


					<div class="custom_hero_wrapper" style="background-image:url({$homepageImageUrl})">
						<div id="custom_hero">
							<h1><a href="{$homeUrl}">{$customHeading}</a></h1>
						</div>
					</div>				
	
					
				</div>
				
				{** Primary Navigation **}							
				<nav class="pkp_navigation_user_wrapper" id="navigationUserWrapperHero" aria-label="{translate|escape key="common.navigation.user"}">
					{load_menu name="user" id="navigationUser" ulClass="pkp_navigation_user" liClass="profile"}
				</nav>

			{/if}		
	
			<div class="pkp_head_wrapper">
		
				<div class="pkp_site_name_wrapper  default_site_name_wrapper">
					{* Logo or site title. Only use <h1> heading on the homepage.
					   Otherwise that should go to the page title. *}
					{if $requestedOp == 'index'}
						<h1 class="pkp_site_name">
					{else}
						<div class="pkp_site_name">
					{/if}
						{capture assign="homeUrl"}
							{if $currentContext && $multipleContexts}
								{url page="index" router=$smarty.const.ROUTE_PAGE}
							{else}
								{url context="index" router=$smarty.const.ROUTE_PAGE}
							{/if}
						{/capture}
						{if $displayPageHeaderLogo && is_array($displayPageHeaderLogo)}
							<a href="{$homeUrl}" class="is_img">
								<img src="{$publicFilesDir}/{$displayPageHeaderLogo.uploadName|escape:"url"}" width="{$displayPageHeaderLogo.width|escape}" height="{$displayPageHeaderLogo.height|escape}" {if $displayPageHeaderLogo.altText != ''}alt="{$displayPageHeaderLogo.altText|escape}"{else}alt="{translate key="common.pageHeaderLogo.altText"}"{/if} />
							</a>
						{elseif $displayPageHeaderTitle && !$displayPageHeaderLogo && is_string($displayPageHeaderTitle)}
							<a href="{$homeUrl}" class="is_text">{$displayPageHeaderTitle}</a>
						{elseif $displayPageHeaderTitle && !$displayPageHeaderLogo && is_array($displayPageHeaderTitle)}
							<a href="{$homeUrl}" class="is_img">
								<img src="{$publicFilesDir}/{$displayPageHeaderTitle.uploadName|escape:"url"}" alt="{$displayPageHeaderTitle.altText|escape}" width="{$displayPageHeaderTitle.width|escape}" height="{$displayPageHeaderTitle.height|escape}" />
							</a>
						{else}
							<a href="{$homeUrl}" class="is_img">
								<img src="{$baseUrl}/templates/images/structure/logo.png" alt="{$applicationName|escape}" title="{$applicationName|escape}" width="180" height="90" />
							</a>
						{/if}
					{if $requestedOp == 'index'}
						</h1>
					{else}
						</div>
					{/if}
				</div>

				<div class="custom_heading_wrapper">
					<div id="custom_heading">
						<h1><a href="{$homeUrl}">{$customHeading}</a></h1>
					</div>
				</div>
				
				{* Primary site navigation *}
				{capture assign="primaryMenu"}
					{load_menu name="primary" id="navigationPrimary" ulClass="pkp_navigation_primary"}
				{/capture}

				{if !empty(trim($primaryMenu)) || $currentContext}
					<nav class="pkp_navigation_primary_row" aria-label="{translate|escape key="common.navigation.site"}">
						<div class="pkp_navigation_primary_wrapper">
							{* Primary navigation menu for current application *}
							{$primaryMenu}

							{if $currentContext}
								{* Search form *}
								{include file="frontend/components/searchForm_simple.tpl"}
							{/if}
						</div>
					</nav>
				{/if}
				
				<nav class="pkp_navigation_user_wrapper" id="navigationUserWrapper" aria-label="{translate|escape key="common.navigation.user"}">
					{load_menu name="user" id="navigationUser" ulClass="pkp_navigation_user" liClass="profile"}
				</nav>
				
			</div><!-- .pkp_head_wrapper -->
		</header><!-- .pkp_structure_head -->

		{* Wrapper for page content and sidebars *}
		{if $isFullWidth}
			{assign var=hasSidebar value=0}
		{/if}
		<div class="pkp_structure_content{if $hasSidebar} has_sidebar{/if}">
			<div id="pkp_content_main" class="pkp_structure_main" role="main">
