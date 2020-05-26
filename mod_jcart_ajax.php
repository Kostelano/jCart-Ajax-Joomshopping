<?php
/**
 * @package	jCart Ajax
 * @author	Konstantin Kolos
 * @copyright	Copyright (C) 2015-2018 Sadko, http://www.sk.ru
 * @copyright	Copyright (C) 2019-2020 Jnotes.net.ua. All rights reserved
 * @contact	http://jnotes.net.ua, admin@jnotes.net.ua
 * @license	http://gnu.org/licenses/gpl-3.0.html, GNU/GPLv3
**/

defined('_JEXEC') or die('Restricted access');

error_reporting(error_reporting() & ~E_NOTICE);
if (!file_exists(JPATH_SITE . '/components/com_jshopping/jshopping.php')) {
	JError::raiseError(500, JText::_('MOD_JCART_AJAX_ERROR_COMPONENT_NOT_INSTALLED'));
}
	require_once (JPATH_SITE . '/components/com_jshopping/lib/factory.php');
	require_once (JPATH_SITE . '/components/com_jshopping/lib/functions.php');

	JSFactory::loadCssFiles();
	JSFactory::loadLanguageFile();

	$doc = JFactory::getDocument();

	$doc->addStyleSheet(JURI::base() . 'media/mod_jcart_ajax/css/' . $params->get('moduleStyle'));
	$doc->addScript(JURI::base() . 'media/mod_jcart_ajax/js/jcart-ajax.js');

	$jshopConfig = JSFactory::getConfig();
	JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_jshopping/models');

	$cart = JModelLegacy::getInstance('cart', 'jshop');
	$cart->load("cart");
	$cart->addLinkToProducts(1, $type="cart");

	require JModuleHelper::getLayoutPath('mod_jcart_ajax');
?>
