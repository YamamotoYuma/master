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
	var headerHight = 50; // ヘッダーの高さ.
	// *ページ内リンク.
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
		// ほかの処理.
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

	/*--------------------------------
	 * 画面内に入ったら発火
	--------------------------------*/
	$(window).on('scroll', function (){
		var elem = $('.js_scrollIn');
		var isAnimate = 'js_active';
		elem.each(function () {
			var elemOffset = $(this).offset().top;
			var scrollPos = $(window).scrollTop();
			var wh = $(window).height();
		
			if(scrollPos > elemOffset - wh + (wh / 8) ){ // 発火位置を制御.
				$(this).addClass(isAnimate);
			}
		});
	});

	  /*--------------------------------
	 * タブレイアウト：タブ切り替え機能
	--------------------------------*/
    $(function() {
        $('.bl_tabCtrl_wrapper a[href^="#panel"]').click(function(){
          $('.ly_tabPanel').hide();
          $('.bl_tabCtrl_wrapper a[href^="#panel"]').removeClass('js_active');
          $(this).toggleClass('js_active');
          $(this.hash).fadeIn();
          return false;
        });
        $('.bl_tabCtrl_wrapper a[href^="#panel"]:eq(0)').trigger('click');
    });

    /*------ 外部リンクから直接タブへアクセス -------*/
    $(function() {
        // URL取得とチェック.
        var url = location.href;
        url = (url.match(/\?id=tab\d+$/) || [])[0];
       if ( url ) {
           // 取得したURLを「?」で分割.
           var params = url.split("?");
           // params内のデータを「=」で分割.
           var tab = params[1].split("=");
       }
        // tab内のデータをtabnameに格納.
        if($(tab).length){
          var tabname = tab[1];
        } else{
          var tabname = "tab1";
        }
        // コンテンツ非表示&amp;タブを非アクティブ.
        $('.ly_cont_main_inner .ly_tabPanel').hide();
        $('.ly_cont_main_inner a').removeClass('js_active');
       
        // 何番目のタブかを格納.
        var tabno = $('.ly_cont_main_inner li#' + tabname).index();
       
        // コンテンツ表示.
        $('.ly_cont_main_inner .ly_tabPanel').eq(tabno).fadeIn();
       
        // タブのアクティブ化.
        $('.ly_cont_main_inner a').eq(tabno).addClass('js_active');
    });

    /*--------------------------------
	 * フォームの送信ボタンを入力完了まで押せないように制御
	--------------------------------*/
    // $(document).ready(function () {
    //     const $submitBtn = $('#formbtn')
    //     $submitBtn.prop('disabled', true);
    //     $('.wpcf7-form input,.wpcf7-form textarea').on('change', function () {
    //         if ( //使用フォームパーツに応じて条件分岐を調整（過不足があると動作しない）.
    //         $('.wpcf7-form input[type="text"]').val() !== "" &&
    //         $('.wpcf7-form input[type="tel"]').val() !== "" &&
    //         $('.wpcf7-form input[type="email"]').val() !== "" &&
    //         $('.wpcf7-form input[type="checkbox"]').val() !== "" &&
    //         $('.wpcf7-form input[type="radio"]').val() !== "" &&
    //         $('.wpcf7-form select').val() !== "" &&
    //         $('.wpcf7-form textarea').val() !== ""
    //         ) {
    //         $submitBtn.prop('disabled', false);
    //         } else {
    //         $submitBtn.prop('disabled', true);
    //         }
    //     });
    // });

	
	// ---------------------------------------------------------------------------------------------[jQuery記述欄ここまで]
});