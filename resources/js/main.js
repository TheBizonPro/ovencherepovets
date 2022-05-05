$(document).ready(function(){

	$('input.phone').mask('+7 (999) 999-99-99', {autoclear: true}).on('click', function(){
		$(this).setCursorPosition(4);
	});
	$('input.phone2').mask('+9 (999) 999-99-99', {autoclear: true}).on('click', function(){
		$(this).setCursorPosition(1);
	});

	var $totop = $('<div/>', {'class': 'totop ic-a', 'style': 'display: none;'}).appendTo('body');
	
	$totop.click(function(){
		$('body,html').animate({scrollTop: 0}, 400);
		return false;
	});

	$(window).scroll(function(){
		if($(this).scrollTop()>300){
			$totop.fadeIn();
		} else {
			$totop.fadeOut();
		}
	}).scroll();

	var $header = $('.header');

	$(window).on('scroll', function(){
		if($(window).scrollTop() > 0 && !$header.is('.header_fix'))
		{
			$header.addClass('header_fix');
		}
		else if($(window).scrollTop() <= 0 && $header.is('.header_fix'))
		{
		    $header.removeClass('header_fix');
		}
	}).scroll();

	$('.step4__tab a').on('click', function(){
		var $this = $(this);
		if (!$this.is('.active'))
		{
			$('.step4__tab a').removeClass('active');
			$this.addClass('active');
			$('.step4__img-box').addClass('hidden');
			$('.step4__img-box[data-id='+$this.data('id')+']').removeClass('hidden');
		}
		return false;
	});
	$('.step4__plus-inn').on('click', function(){
		var $item = $(this).parent();
		if (!$item.is('.show'))
		{
			$('.step4__plus.show').removeClass('show');
			$item.addClass('show');
		}
		else
		{
			$item.removeClass('show');
		}
	});

	$('.step7__tab div a').on('click', function(){
		var $this = $(this).parent();
		if (!$this.is('.active'))
		{
			$('.step7__tab div').removeClass('active');
			$this.addClass('active');
			$('.step7__img img').addClass('hidden');
			$('.step7__img img[data-id='+$this.data('id')+']').removeClass('hidden');
			$('.step7__img-inf').addClass('hidden');
			$('.step7__img-inf[data-id='+$this.data('id')+']').removeClass('hidden');
		}
		return false;
	});

	$('.step10__list').slick({
		speed: 700,
		centerMode: true,
		centerPadding: '19%',
		slidesToShow: 2,
		prevArrow: '.step10__sl .slarr_l',
		nextArrow: '.step10__sl .slarr_r',
		responsive: [
		    {
				breakpoint: 1200,
				settings: {
					centerPadding: '10%'
				}
		    },
		    {
				breakpoint: 639,
				settings: {
					slidesToShow: 1,
					centerPadding: '10%'
				}
		    }
		]
	});

	$('.step11__list').slick({
		speed: 900,
		prevArrow: '.step11__sl .slarr_l',
		nextArrow: '.step11__sl .slarr_r'/*,
		responsive: [
		    {
				breakpoint: 500,
				settings: {
					slidesToShow: 1
				}
		    }
		]*/
	});
    $('.step11__list').on('beforeChange', function(event, slick, currentSlide, nextSlide){
    	$('.step11__tab-item').removeClass('active');
        $('.step11__tab-item:eq('+nextSlide+')').addClass('active');
    });
	$('.step11__tab-item').on('click', function(){
		$('.step11__list').slick('slickGoTo', $(this).index());
		return false;
	});

	$('.step12__more a').on('click', function(){
		//$('.step12__vk').show();
		return false;
	});

	$('.pdtl__big-list').slick({
		speed: 500, 
		prevArrow: '.pdtl__big-arr_l',
		nextArrow: '.pdtl__big-arr_r',
		asNavFor: $('.pdtl__preview')
	});
	$('.pdtl__preview').slick({
		slidesToShow: 3,
		focusOnSelect: true,
		variableWidth: true,
		asNavFor: $('.pdtl__big-list'), 
		arrows: false
	});

	var _thank = function()
	{
		$.fancybox.open({
			src: '#mthank', autoFocus: false, hideScrollbar: true, closeExisting: true, touch: false, 
			btnTpl: {
				smallBtn: 
				'<div data-fancybox-close class="mclose ic-a"></div>'
			}
		});
	};

	$('.mbox').fancybox({
		autoFocus: false, hideScrollbar: true, closeExisting: true, touch: false, 
		btnTpl: {
			smallBtn: 
			'<div data-fancybox-close class="mclose ic-a"></div>'
		}
	});

	$(document).on('click', '.open-pp', function(){
		$.fancybox.open({
			src: '#mpp', autoFocus: false, hideScrollbar: true, closeExisting: false, touch: false, 
			btnTpl: {
				smallBtn: 
				'<div data-fancybox-close class="mclose ic-a"></div>'
			}
		});
		return false;
	});

	// $.fancybox.open({
	// 	src: '#mcalc', autoFocus: false, hideScrollbar: true, closeExisting: true, touch: false, 
	// 	btnTpl: {
	// 		smallBtn: 
	// 		'<div data-fancybox-close class="mclose ic-a"></div>'
	// 	}
	// });
	
	$('.open-product').on('click', function(){
		var id = $(this).data('id');
		$.fancybox.open({
			type: 'ajax', src: site.ajax_url+'?action=product&id='+id, autoFocus: false, hideScrollbar: true, closeExisting: true, touch: false, 
			btnTpl: {
				smallBtn: 
				'<div data-fancybox-close class="mclose ic-a"></div>'
			},
			afterShow: function()
			{
				$('.pdtl_m .pdtl__big-list').slick({
					speed: 500, 
					prevArrow: '.pdtl_m .pdtl__big-arr_l',
					nextArrow: '.pdtl_m .pdtl__big-arr_r',
					asNavFor: $('.pdtl_m .pdtl__preview')
				});
				$('.pdtl_m .pdtl__preview').slick({
					slidesToShow: 3,
					focusOnSelect: true,
					variableWidth: true,
					asNavFor: $('.pdtl_m .pdtl__big-list'), 
					arrows: false
				});
				$('.pdtl_m input.phone').mask('+7 (999) 999-99-99', {autoclear: true}).on('click', function(){
					$(this)[0].selectionStart = 2;
					$(this).focus();
				});
				formInit('.form-popup');
			}
		});
		return false;
	});

	$('.step14__item').toShowHide({
		button: '.step14__item-lvl',
		box: '.step14__item-val',
		effect: 'slide',
		anim_speed: 400,
		close_only_button: true,
		onBefore: function(el){
			el.addClass('show');
		},
		onAfter: function(el){
			el.removeClass('show');
		}
	});

	var formInit = function(target)
	{
		$(target).ajaxForm({
	    	beforeSubmit: function(arr, $form, options)
	    	{
	    		var err = false;
	    		if($form.find('[name=phone]').val().replace(/\D+/g,'').length != 11)
	    		{
	    			$form.find('[name=phone]').addClass('error');
	    			err = true;
	    		}
	    		else
	    		{
	    			$form.find('[name=phone]').removeClass('error');
	    		}
	    		if ($form.find('[name=question]').length)
	    		{
		    		if($form.find('[name=question]').val().length < 5)
		    		{
		    			$form.find('[name=question]').addClass('error');
		    			err = true;
				    }
				    else
				    {
		    			$form.find('[name=question]').removeClass('error');
				    }
	    		}
	    		if ($form.find('[name=pp]').length)
	    		{
				    if (!$form.find('[name=pp]').prop('checked'))
				    {
				    	$form.find('[name=pp]').addClass('error');
						err = true;
				    }
		    		else
		    		{
		    			$form.find('[name=pp]').removeClass('error');
		    		}
	    		}
			    if (err) return false;
	    	},
		    success: function(responseText, statusText, xhr, $form)
		    { 
		    	if(responseText != 'ok')
		    	{
					alert(responseText);
				}
				else
				{
					if(typeof($form.data('metrika')) !== 'undefined' && $form.data('metrika').length)
					{

						ym(68446141, 'reachGoal', $form.data('metrika'));
					}
					if(typeof($form.data('url')) !== 'undefined' && $form.data('url').length)
					{
						top.location = $form.data('url');
					}
					else
					{
						_thank();
						setTimeout(function(){
							$.fancybox.close();
						}, 5000);
					}
					$form.find('input,textarea').val('');
				}
		    }
	    });
	};

	formInit('.form-app');
	
	var p_mail = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

	$('.form-load').ajaxForm({
    	beforeSubmit: function(arr, $form, options)
    	{
    		var err = false;
    		if($form.find('[name=phone]').val().replace(/\D+/g,'').length != 11)
    		{
    			$form.find('[name=phone]').addClass('error');
    			err = true;
    		}
    		else
    		{
    			$form.find('[name=phone]').removeClass('error');
    		}
			if(!p_mail.test($form.find('[name=mail]').val()))
			{
				$form.find('[name=mail]').addClass('error');
				err = true;
		    }
		    else
		    {
		    	$form.find('[name=mail]').removeClass('error');
		    }
    		if ($form.find('[name=pp]').length)
    		{
			    if (!$form.find('[name=pp]').prop('checked'))
			    {
			    	$form.find('[name=pp]').addClass('error');
					err = true;
			    }
	    		else
	    		{
	    			$form.find('[name=pp]').removeClass('error');
	    		}
    		}
		    if (err) return false;
    	},
	    success: function(responseText, statusText, xhr, $form)
	    { 
	    	if(responseText != 'ok')
	    	{
				alert(responseText);
			}
			else
			{
				if(typeof($form.data('metrika')) !== 'undefined' && $form.data('metrika').length)
				{
					ym(68446141, 'reachGoal', $form.data('metrika'));
				}
				_thank();
				setTimeout(function(){
					$.fancybox.close();
				}, 5000);
				window.open($form.find('[name=file]').val(), '_blank');
				$form.find('input,textarea').val('');
			}
	    }
    });

    var curr = 1;
    var quizStep = function(id, $prev, $next)
    {
    	var ww = $(window).width(), video, metrika;
		$('.quiz__pr-lvl span').text(id);
		$('.quiz__pr-val > div').removeClass('active');
		$('.quiz__pr-val > div:nth-child('+id+')').addClass('active');
		if ($next.length)
		{
			$prev.removeClass('active');
			$next.addClass('active');
			if (ww > 900)
			{
				$prev.find('.quiz__step-box').slideUp(250);
				$next.find('.quiz__step-box').slideDown(250);
			}
			video = $next.data('video');
			if (!$next.is('.show'))
			{
				$next.addClass('show');
				metrika = $prev.data('metrika');
			}
		}
		else
		{
			$('.quiz__step').hide();
			$('.quiz__end').show();
			video = $('.quiz__end').data('video');
			metrika = $prev.data('metrika');
		}
		if (metrika)
		{
			ym(68446141, 'reachGoal', metrika);
		}
		if (video)
		{
			setTimeout(function(){
				$('.quiz__video-box iframe').attr('src', 'https://www.youtube.com/embed/'+video+'?enablejsapi=1&version=3&playerapiid=ytplayer');
			}, 100);
			if (ww > 900)
			{
				setTimeout(function(){
					$('.quiz__video-box iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
				}, 1100);
			}
		}
		curr = id;
    };
    $('.quiz__step input[type=radio]').change(function(){
    	var $step = $(this).parents('.quiz__step');
    	$step.find('.quiz__step-bt a').removeClass('disabled');
    });
    $('.quiz__step-bt a').on('click', function(){
    	var $this = $(this);
    	if (!$this.is('.disabled'))
    	{
    		var $step = $this.parents('.quiz__step');
    		var $next = $step.next('.quiz__step');
    		quizStep(curr+1, $step, $next);
    	}
    	return false;
    });
    $('.quiz__step').on('click', function(){
    	var $step = $(this);
    	if (!$step.is('.active'))
    	{
    		if ($step.find('input[type=radio]:checked').length)
    		{
    			quizStep($step.data('id'), $('.quiz__step[data-id='+curr+']'), $step);
    		}
    	}
    });

});

$.fn.setCursorPosition = function(pos)
{
	if ($(this).get(0).setSelectionRange)
	{
		$(this).get(0).setSelectionRange(pos, pos);
	}
	else if ($(this).get(0).createTextRange)
	{
		var range = $(this).get(0).createTextRange();
		range.collapse(true);
		range.moveEnd('character', pos);
		range.moveStart('character', pos);
		range.select();
	}
};