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
?>

<style type="text/css">
.jc-img-cart-select {
	background: url(/<?php echo $params->get('cartImageSelect'); ?>) no-repeat scroll 0 0;
	width: <?php echo $params->get('cartImageSelectWidth'); ?>;
	height: <?php echo $params->get('cartImageSelectHeight'); ?>;
}
.jc-img-wish-select {
	background: url(/<?php echo $params->get('wishImageSelect'); ?>) no-repeat scroll 0 0;
	width: <?php echo $params->get('wishImageSelectWidth'); ?>;
	height: <?php echo $params->get('wishImageSelectHeight'); ?>;
}
</style>

<div class="jc-shop">
<?php if ($params->get('cartIcon') == 0) { ?>

	<?php if ($params->get('cartFields_1') == 1) { ?>
		<a class="jc-field" href="<?php echo $params->get('cartFieldUrl_1'); ?>" <?php echo $params->get('moduleStyleAttribute'); ?>="<?php echo $params->get('cartFieldTitle_1'); ?>" target="<?php echo $params->get('cartFieldsAttribute'); ?>"><?php echo $params->get('cartFieldTitle_1'); ?></a>&nbsp;<?php echo $params->get('cartFieldsSeparator'); ?>
	<?php } ?>

	<?php if ($params->get('cartFields_2') == 1) { ?>
		<a class="jc-field" href="<?php echo $params->get('cartFieldUrl_2'); ?>" <?php echo $params->get('moduleStyleAttribute'); ?>="<?php echo $params->get('cartFieldTitle_2'); ?>" target="<?php echo $params->get('cartFieldsAttribute'); ?>"><?php echo $params->get('cartFieldTitle_2'); ?></a>&nbsp;<?php echo $params->get('cartFieldsSeparator'); ?>
	<?php } ?>

	<?php if ($params->get('cartFields_3') == 1) { ?>
		<a class="jc-field" href="<?php echo $params->get('cartFieldUrl_3'); ?>" <?php echo $params->get('moduleStyleAttribute'); ?>="<?php echo $params->get('cartFieldTitle_3'); ?>" target="<?php echo $params->get('cartFieldsAttribute'); ?>"><?php echo $params->get('cartFieldTitle_3'); ?></a>&nbsp;<?php echo $params->get('cartFieldsSeparator'); ?>
	<?php } ?>

	<?php if ($params->get('cartFields_4') == 1) { ?>
		<a class="jc-field" href="<?php echo $params->get('cartFieldUrl_4'); ?>" <?php echo $params->get('moduleStyleAttribute'); ?>="<?php echo $params->get('cartFieldTitle_4'); ?>" target="<?php echo $params->get('cartFieldsAttribute'); ?>"><?php echo $params->get('cartFieldTitle_4'); ?></a>&nbsp;<?php echo $params->get('cartFieldsSeparator'); ?>
	<?php } ?>

	<?php if ($params->get('cartFields_5') == 1) { ?>
		<a class="jc-field" href="<?php echo $params->get('cartFieldUrl_5'); ?>" <?php echo $params->get('moduleStyleAttribute'); ?>="<?php echo $params->get('cartFieldTitle_5'); ?>" target="<?php echo $params->get('cartFieldsAttribute'); ?>"><?php echo $params->get('cartFieldTitle_5'); ?></a>&nbsp;<?php echo $params->get('cartFieldsSeparator'); ?>
	<?php } ?>

	<a class="jc-cart-text" href="<?php echo SEFLink('index.php?option=com_jshopping&controller=cart&task=view', 1) ?>" <?php echo $params->get('moduleStyleAttribute'); ?>="<?php echo JText::_('MOD_JCART_AJAX_GO_TO_CART') ?>"><?php echo JText::_('MOD_JCART_AJAX_CART') ?></a>

	(<a class="jc-qt-product" href="<?php echo SEFLink('index.php?option=com_jshopping&controller=cart&task=view', 1) ?>" <?php echo $params->get('moduleStyleAttribute'); ?>="<?php echo JText::_('MOD_JCART_AJAX_GO_TO_CART') ?>"><?php echo $cart->count_product ?></a>)

<?php } elseif ($params->get('cartIcon') == 1) { ?>

	<?php if ($params->get('wishIcon') == 1) { ?>
		<a class="jc-img-wish" href="<?php echo SEFLink('index.php?option=com_jshopping&controller=wishlist&task=view', 1) ?>" <?php echo $params->get('moduleStyleAttribute'); ?>="<?php echo JText::_('MOD_JCART_AJAX_GO_TO_WISHLIST') ?>"><span>&nbsp;</span></a>
	<?php } ?>

	<div class="jc-img-cart">
		<a class="jc-qt-product" href="<?php echo SEFLink('index.php?option=com_jshopping&controller=cart&task=view', 1) ?>" <?php echo $params->get('moduleStyleAttribute'); ?>="<?php echo JText::_('MOD_JCART_AJAX_GO_TO_CART') ?>"><?php echo $cart->count_product ?></a>
	</div>

<?php } elseif ($params->get('cartIcon') == 2) { ?>

	<?php if ($params->get('wishIcon') == 1) { ?>
		<a class="jc-img-wish-select" href="<?php echo SEFLink('index.php?option=com_jshopping&controller=wishlist&task=view', 1) ?>" <?php echo $params->get('moduleStyleAttribute'); ?>="<?php echo JText::_('MOD_JCART_AJAX_GO_TO_WISHLIST') ?>"><span>&nbsp;</span></a>
	<?php } ?>

	<div class="jc-img-cart-select">
		<a class="jc-qt-product" href="<?php echo SEFLink('index.php?option=com_jshopping&controller=cart&task=view', 1) ?>" <?php echo $params->get('moduleStyleAttribute'); ?>="<?php echo JText::_('MOD_JCART_AJAX_GO_TO_CART') ?>"><?php echo $cart->count_product ?></a>
	</div>
<?php } ?>

	<div class="jc-content">
	<?php if (count($cart->products) == 0) { ?>
		<div class="jc-list-empty">
			<?php echo JText::_('MOD_JCART_AJAX_CART_IS_EMPTY'), JText::_('MOD_JCART_AJAX_CART_IS_EMPTY_DESC') ?>
		</div>
	<?php } else { ?>

	<div class="jc-list-product">
		<div class="jc-rows">
		<?php foreach ($cart->products as $key_id=>$value) { ?>
			<div class="jc-row">
				<a class="jc-img-product" href="<?php echo $value['href'] ?>">
					<img src="<?php echo $jshopConfig->image_product_live_path ?>/<?php if ($value["thumb_image"]!='') echo $value["thumb_image"]; else echo 'noimage.gif' ?>">
				</a>

				<div class="jc-name-product">
					<a href="<?php echo $value['href'] ?>" name="<?php echo $value["product_id"] ?>"><?php echo $value["product_name"] ?></a>
					<?php foreach ($value['attributes_value'] as $attr) { ?>
						<div class="jc-attr" id="attr_id_<?php echo $value["product_id"].'_'.$attr->attr_id.$attr->value_id ?>">
							<?php echo $attr->attr ?>: <?php echo $attr->value ?>
						</div>
					<?php } ?>
				</div>

				<div class="jc-control">
					<a class="jc-remove" href="<?php echo $value["href_delete"] ?>?ajax=1">&#10006;</a>
						<span class="btn jc-qt-minus" minuskey="quantity[<?php echo $key_id ?>]" minusval="<?php echo $value["quantity"] ?>">&#8722;</span>
							<input class="jc-inputbox" type="text" value="<?php echo $value["quantity"] ?>" name="quantity[<?php echo $key_id ?>]">
						<span class="btn jc-qt-plus" pluskey="quantity[<?php echo $key_id ?>]" plusval="<?php echo $value["quantity"] ?>">&#43;</span>
					<span class="jc-price">&rarr; <?php echo formatprice($value["price"]) ?></span>
				</div>
			</div>
		<?php } ?>
		</div>

		<hr class="jc-hr">
		<div class="jc-total">
			<?php echo JText::_('MOD_JCART_AJAX_TOTAL_PRODUCTS').': <span class="jc-total-qt">'.$cart->count_product.'</span>, '.JText::_('MOD_JCART_AJAX_TOTAL_AMOUNT').' <span class="jc-total-qt">'.formatprice($cart->getSum(0, 1)) ?></span>
		</div>

		<div class="jc-btn-group">
			<a class="btn btn-primary" href="<?php echo SEFLink('index.php?option=com_jshopping&controller=cart&task=view', 1) ?>"><?php echo JText::_('MOD_JCART_AJAX_GO_TO_CART') ?></a>
			<a class="btn btn-success" href="<?php echo SEFLink('index.php?option=com_jshopping&controller=cart&task=clear', 1); ?>" onclick="return confirm('<?php echo JText::_('MOD_JCART_AJAX_CLEAR_CART_DESC') ?>')"><?php echo JText::_('MOD_JCART_AJAX_CLEAR_CART') ?></a>
		</div>
	</div>

	<?php } ?>
	</div>
</div>

<div class="jc-hidden">
	<span class="datac-one"><?php echo JURI::base() ?></span>
	<span class="datac-uic"><?php echo SEFLink('index.php?option=com_jshopping&controller=cart&task=view', 1) ?></span>
	<span class="datac-urp"><?php echo SEFLink('index.php?option=com_jshopping&controller=product&task=view', 1) ?></span>
	<span class="datac-udl"><?php echo SEFLink('index.php?option=com_jshopping&controller=cart&task=delete', 1) ?></span>
	<span class="datac-ugx"><?php echo SEFLink('index.php?option=com_jshopping&controller=cart&task=clear', 1) ?></span>
	<span class="datac-tip"><?php echo $jshopConfig->image_product_live_path ?></span>
	<span class="datac-vpp"><?php echo $jshopConfig->product_price_precision ?></span>
	<span class="datac-hcc"><?php echo $jshopConfig->currency_code ?></span>
	<span class="datac-tac"><?php echo JText::_('MOD_JCART_AJAX_PRODUCT_IN_CART') ?></span>
	<span class="datac-tgc"><?php echo JText::_('MOD_JCART_AJAX_GO_TO_CART') ?></span>
	<span class="datac-tpc"><?php echo JText::_('MOD_JCART_AJAX_TOTAL_PRODUCTS') ?></span>
	<span class="datac-tps"><?php echo JText::_('MOD_JCART_AJAX_TOTAL_AMOUNT') ?></span>
	<span class="datac-tgx"><?php echo JText::_('MOD_JCART_AJAX_CLEAR_CART') ?></span>
	<span class="datac-err"><?php echo JText::_('MOD_JCART_AJAX_ERROR_ADDING_TO_CART') ?></span>
</div>
