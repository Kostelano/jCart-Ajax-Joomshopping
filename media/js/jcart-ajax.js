jQuery(document).ready(function(){
one=jQuery('span.datac-one').html();
uic=jQuery('span.datac-uic').html();
urp=jQuery('span.datac-urp').html();
udl=jQuery('span.datac-udl').html();
ugx=jQuery('span.datac-ugx').html();
tip=jQuery('span.datac-tip').html();
vpp=jQuery('span.datac-vpp').html();
hcc=jQuery('span.datac-hcc').html();
tac=jQuery('span.datac-tac').text();
tgc=jQuery('span.datac-tgc').text();
tpc=jQuery('span.datac-tpc').text();
tps=jQuery('span.datac-tps').text();
tgx=jQuery('span.datac-tgx').text();
err=jQuery('span.datac-err').text();
if(jQuery('form[name="updateCart"], form[name="oneStepCheckoutForm"]').length){
	jQuery('.jc-shop .jc-content').remove();
}
function Af(){
	jQuery('.jc-in-cart-list').remove();
	jQuery('.jc-in-cart').remove();
	a=jQuery('input#product_id').val();
	b=jQuery('.jc-shop .jc-name-product a').map(function(){return jQuery(this).attr('name')});
	jQuery.each(jQuery.unique(b),function(b,c){
	jQuery('.productitem_'+c+' .product_buy, .productitem_'+c+' .btn-success').after('<a class="jc-in-cart-list" href="'+uic+'">'+tac+'</a>');
	a==c&&jQuery('.prod_buttons .buttons').after('<a class="btn btn-success jc-in-cart" href="'+uic+'">'+tac+'</a>');
	});
}
function Bf(a){Af(),
	jQuery('.productitem_'+a+' .jc-in-cart-list').prepend('<div class="jc-list-added">'+tac+'</div>'),
	jQuery('.jc-in-cart').prepend('<div class="jc-in-cart-added">'+tac+'</div>'),
	jQuery('.jc-list-added, .jc-in-cart-added').fadeOut(2400)
}
function Cf(a){for(var b in a)if('products'==b&&a.hasOwnProperty(b))for(var c in a[b])if(a[b].hasOwnProperty(c)){
	for(var d in a[b][c]){
		'category_id'==d&&(str_cat=a[b][c][d]);
		'product_id'==d&&(str_pid=a[b][c][d]);
		'thumb_image'==d&&(str_img=a[b][c][d]);
		if(str_img=='')var str_img='noimage.gif';
		'product_name'==d&&(str_pro=a[b][c][d]);
		if('attributes_value'==d){var str_atr='';for(e in a[b][c][d]) if(a[b][c][d].hasOwnProperty(e)){
				for(var f in a[b][c][d][e])
				'attr_id'==f&&(str_aid=a[b][c][d][e][f]),
				'value_id'==f&&(str_vid=a[b][c][d][e][f]),
				'attr'==f&&(str_anm=a[b][c][d][e][f]),
				'value'==f&&(str_avl=a[b][c][d][e][f]);
				str_atr+='<div class="jc-attr" id="attr_id_'+str_pid+'_'+str_aid+str_vid+'">'+str_anm+': '+str_avl+'</div>'
		}}
		if('quantity'==d){
			str_but='<span class="btn jc-qt-minus" minuskey="quantity['+c+']" minusval="'+a[b][c][d]+'">&#8722;</span> <input type="text" value="'
			+a[b][c][d]+'" class="jc-inputbox" name="quantity['+c+']"> <span class="btn jc-qt-plus" pluskey="quantity['+c+']" plusval="'+a[b][c][d]+'">&#43;</span>';
		}
		'price'==d&&(str_prc='<span class="jc-price"><span>&rarr;</span>'+a[b][c][d].toFixed(vpp)+' '+hcc+'</span>')
	}
	str_row+='<div class="jc-row"><a class="jc-img-product" href="'+urp+'?category_id='+str_cat+'&product_id='+str_pid+'"><img src="'
	+tip+'/'+str_img+'"></a><div class="jc-name-product"><a href="'+urp+'?category_id='+str_cat+'&product_id='+str_pid+'" name="'+str_pid+'">'
	+str_pro+'</a>'+str_atr+'</div><div class="jc-control"><a class="jc-remove" href="'+udl+'?number_id='+c+'?ajax=1">&#10006;</a> '+str_but+''+str_prc+'</div></div>'
}}
function Df(a){
	str_row='';Cf(a);if((a.price_product-a.rabatt_summ)>0)str_sum=(a.price_product-a.rabatt_summ).toFixed(vpp);else str_sum=0;
	jQuery('.jc-shop .jc-content').html('<div class="jc-list-product"><div class="jc-rows">'+str_row+'</div><hr class="jc-hr"><div class="jc-total">'+tpc+' <span class="jc-total-qt">'+a.count_product+'</span>, '+tps+' <span class="jc-total-qt">'+str_sum+' '+hcc+'</span></div><div class="jc-btn-center"><a class="btn btn-primary" href="'+uic+'">'+tgc+'</a> <a class="btn btn-success" href="'+ugx+'">'+tgx+'</a></div></div>')
}
jQuery('body').on('click','.oiproduct .button_buy, .product_corps .button_buy',function(a){
	a.preventDefault();
	b=jQuery(this).attr('href');
	c=b.split("product_id=")[1];
	// jQuery('body').append('<div class="jc-loading-ajax"></div>');
	jQuery.ajax({cache:!1,url:b+'&ajax=1',dataType:'json',success:function(a){
		jQuery('.jc-loading-ajax').remove();
		'cart'==a.type_cart?(jQuery('.jc-shop .jc-qt-product').html(a.count_product),Df(a),Bf(c)):window.location.assign(b)
	},error:function(a){jQuery('.jc-loading-ajax').remove();location.reload()}});return!1
});
jQuery('body').on('click','.prod_buttons .prod_buy, .prod_buttons .btn-primary',function(a){
	a.preventDefault();
	a=jQuery('form[name="product"]').serialize();
	// jQuery('body').append('<div class="jc-loading-ajax"></div>');
	jQuery.ajax({cache:!1,url:one+'index.php?option=com_jshopping&controller=cart&task=add&'+a+'&ajax=1',dataType:'json',ifModified:true,success:function(a){
		jQuery('.jc-loading-ajax').remove();
		'cart'==a.type_cart?(jQuery('.jc-shop .jc-qt-product').html(a.count_product),Df(a),Bf()):alert(err)
	},error:function(){jQuery('.jc-loading-ajax').remove();location.reload()}});return!1
});
jQuery('body').on('click','.jc-remove',function(a){
	a.preventDefault();
	a=jQuery(this).attr('href');
	jQuery('.jc-shop .jc-total').append('<div class="jc-loading"></div>');
	jQuery.ajax({cache:!1,url:a+'&ajax=1',dataType:'json',success:function(a){
		jQuery('.jc-loading').remove();
		'cart'==a.type_cart?(
			jQuery('.jc-shop .jc-qt-product').html(a.count_product),str_row='',Cf(a),
			str_sum=(a.price_product-a.rabatt_summ).toFixed(vpp),str_sum<0&&(jQuery(str_sum=0)),
			jQuery('.jc-shop .jc-content').html('<div class="jc-list-product"><div class="jc-rows">'+str_row+'</div><hr class="jc-hr"><div class="jc-total">'
			+tpc+' '+a.count_product+' '+tps+' '+str_sum+' '+hcc+'</div><div class="jc-btn-center"><a class="btn btn-primary" href="'+uic+'">'+tgc+'</a> <a class="btn btn-success" href="'+ugx+'">'+tgx+'</a></div></div>'),
			a.count_product=='0'&&(jQuery('.jc-shop .jc-list-product').remove()),Af()
		):setTimeout(function(){location.reload()})
	},error:function(){jQuery('.jc-loading').remove();location.reload()}});return!1
});
jQuery('body').on('click','.jc-qt-minus',function(a){
	a.preventDefault();
	a=jQuery(this).attr('minuskey');
	b=jQuery(this).attr('minusval'),c=parseFloat(b)-1;
	a=0!=c?a+'='+c:a+'='+b;
	jQuery('.jc-shop .jc-total').append('<div class="jc-loading"></div>');
	jQuery.ajax({cache:!1,url:one+'index.php?option=com_jshopping&controller=cart&task=refresh&'+a+'&ajax=1',dataType:'json',ifModified:true,success:function(a){
		jQuery('.jc-loading').remove();
		'cart'==a.type_cart&&(jQuery('.jc-shop .jc-qt-product').html(a.count_product),Df(a))
	},error:function(){jQuery('.jc-loading').remove();location.reload()}});return!1
});
jQuery('body').on('click','.jc-qt-plus',function(a){
	a.preventDefault();
	a=jQuery(this).attr('pluskey');
	b=jQuery(this).attr('plusval'),b=parseFloat(b)+1;
	a=a+'='+b;
	jQuery('.jc-shop .jc-total').append('<div class="jc-loading"></div>');
	jQuery.ajax({cache:!1,url:one+'index.php?option=com_jshopping&controller=cart&task=refresh&'+a+'&ajax=1',dataType:'json',ifModified:true,success:function(a){
		jQuery('.jc-loading').remove();
		'cart'==a.type_cart&&(jQuery('.jc-shop .jc-qt-product').html(a.count_product),Df(a))
	},error:function(){jQuery('.jc-loading').remove();location.reload()}});return!1
});
jQuery('body').on('keyup','.jc-inputbox',function(a){
	a.preventDefault();
	a=jQuery(this).attr('name');
	b=jQuery(this).val();
	if(0!=b)a=a+'='+b,
	jQuery('.jc-shop .jc-total').append('<div class="jc-loading"></div>'),
	jQuery.ajax({cache:!1,url:one+'index.php?option=com_jshopping&controller=cart&task=refresh&'+a+'&ajax=1',dataType:'json',ifModified:true,success:function(a){
		jQuery('.jc-loading').remove();
		'cart'==a.type_cart?(jQuery('.jc-shop .jc-qt-product').html(a.count_product),Df(a)):setTimeout(function(){location.reload()})
	},error:function(){jQuery('.jc-loading').remove();location.reload()}});else return!1
});Af()});
