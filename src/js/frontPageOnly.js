jQuery(function () {
  let headerHeight;

    /* IOSにおいてbackground-attachment:fixedが未対応でposition:fixedに切り替えたことによる対応 */
    jQuery(window).scroll(function () {
      const about = jQuery('#about');
      if (400 <= jQuery(window).scrollTop() && jQuery(window).scrollTop() < jQuery('#works').offset().top) {
        //背景画像表示
        about.addClass('bgshow');
      } else {
        //非表示
        if (about.hasClass('bgshow')) {
          about.removeClass('bgshow');
        }
      }
    });

  /* scroll spyのdata-offset属性をheaderの高さで調整  */
  jQuery(window).on('load resize', function () {
    headerHeight = jQuery('#header').height();
    jQuery('body').attr('data-offset', headerHeight);
  });

  /* タイピングアニメーション */
  ityped.init('#ityped', {
    strings: ["コーディングであなたの想いを、カタチに。"],
    startDelay: 200,
    typeSpeed: 75,
    // startDelay: 1000,
    // typeSpeed: 60,
    loop: false,
    cursorChar: ""
  });

  /* header固定 */
  //headerをfixedにするタイミング指定
  //headerの重なりのため、headerがfixed時のみmsgセクションのpaddingtopを変更
  const header = jQuery('#header');
  const headerOffset = header.offset();
  const navbar = jQuery('.navbar');

  const msg = jQuery('#msg');
  const msgPt = msg.css("padding-top").replace("px", "");

  jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > headerOffset.top) {
      header.addClass('fixed');
      navbar.addClass('transparent');
      msg.css("padding-top", parseInt(msgPt) + parseInt(headerHeight) + "px");
    } else {
      header.removeClass('fixed');
      navbar.removeClass('transparent');
      msg.css("padding-top", msgPt + "px");
    }
  });

  /* お問合せにページ遷移 */
  jQuery('.price-btn').click(function () {
    const contactPosition = jQuery('#contact').offset();
    jQuery('html, body').animate({
      'scrollTop': contactPosition.top
    }, 400);
    return false;
  });

  /* ページ内ジャンプ */
  jQuery('.nav-link').click(function () {
    //href属性を取得(セクションのidと一致)
    const id = jQuery(this).attr('href');
    let navHeight = 60;//初期値 ヘッダーの高さ分
    if (!(jQuery('#header').hasClass('fixed'))) {
      navHeight = jQuery('.navbar').outerHeight();
    }

    //該当idのセクションのスクロール位置を取得
    const position = jQuery(id).offset().top - navHeight;

    //処理のタイミングがほぼ同時なので、処理順を定義
    jQuery.when(
      jQuery('html, body').animate({
        'scrollTop': position
      }, 400)
    ).done(function () {
      if (window.matchMedia('(min-width: 768px)').matches) {
        // 処理なし
      } else {
        //ハンバーガーメニューを閉じる
        jQuery('.navbar-toggler').trigger('click');
      }
    })
    return false;
  });
});

