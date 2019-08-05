{**
 * frontend/components/header.tpl
 *
 * Copyright (c) 2014-2019 Simon Fraser University
 * Copyright (c) 2003-2019 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @brief Common frontend site header.
 *
 *}
{if $heroHeader}
{include file="frontend/components/headerHero.tpl"}
{else}
{include file="frontend/components/headerDefault.tpl"}
{/if}