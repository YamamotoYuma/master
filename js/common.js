jQuery(document).ready(function ($) {
	// ---------------------------------------------------------------------------------------------[jQuery記述欄ここから]
	/*--------------------------------
	 * フォームインラインバリデーション（validationEngine）
	--------------------------------*/
	$(document).ready(function () {
		$("#inline-validation-engine").validationEngine();
	});
	$(document).ready(function () { //パラメーター
		$(".need").addClass("validate[required]").attr('data-prompt-position', 'inline');
		$(".mail_address").addClass("validate[required,custom[email]]").attr('data-prompt-position', 'inline');
		$(".tell_number").addClass("validate[required,custom[phone]]").attr('data-prompt-position', 'inline');
		$(".postal_code").addClass("validate[required,custom[number]]").attr('data-prompt-position', 'inline');
		$(".name_rubi").addClass("validate[required,custom[katakana]]").attr('data-prompt-position', 'inline');
	});

	/*--------------------------------
	 * モバイルドロワーメニュー
	--------------------------------*/
	$('.js_menuTrigger').on('click', function () {
		if ($(this).hasClass('is_active')) {
			$(this).removeClass('is_active');
			$('.js_siteBody_inner').removeClass('is_open');
			$('.js_mobileMenu').removeClass('is_open');
		} else {
			$(this).addClass('is_active');
			$('.js_siteBody_inner').addClass('is_open');
			$('.js_mobileMenu').addClass('is_open');
		}
	});

	/*------ アコーディオン：モバイルメニュー -------*/
	$(".bl_mobileMenu_nav .sub-menu").css("display", "none");
	$(".bl_mobileMenu_nav .menu-item-has-children").append('<span class="bl_mobileMenu_accBtn"></span>');
	$(".bl_mobileMenu_accBtn").click(function () {
		$(".sub-menu").toggleClass("js_open").slideToggle();
		$(".bl_mobileMenu_accBtn").toggleClass("js_open");
	});

	/*--------------------------------
	 * ページトップへ戻る：100pxスクロールしたら表示
	--------------------------------*/
	var pagetop = $('.js_pageTop');
	pagetop.hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			pagetop.fadeIn();
		} else {
			pagetop.fadeOut();
		}
	});

	/*--------------------------------
	 * スムーススクロール（ページ内リンク）
	--------------------------------*/
	var headerHight = 50; //ヘッダーの高さ
	//*ページ内リンク
	$('a[href^="#"]').click(function () {
		var href = $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'body' : href);
		var position = target.offset().top - headerHight;
		$("html, body").animate({ scrollTop: position }, 550, "swing");
		return false;
	});

	/*--------------------------------
	 * スムーススクロール（ページ外リンク）
	--------------------------------*/
	var url = $(location).attr('href');
	if (url.indexOf("?id=") == -1) {
		// ほかの処理
	} else {
		var url_sp = url.split("?id=");
		var hash = '#' + url_sp[url_sp.length - 1];
		var target2 = $(hash);
		var position2 = target2.offset().top - headerHight;
		$("html, body").animate({ scrollTop: position2 }, 550, "swing");
	};

	/*--------------------------------
	 * ヘッダーナビ：200pxスクロール発火で上から表示
	--------------------------------*/
	var sticky = $('.js_stickyNav');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 200) {
			sticky.addClass('is_scroled');
		} else {
			sticky.removeClass('is_scroled');
		}
	});
	// ---------------------------------------------------------------------------------------------[jQuery記述欄ここまで]
});