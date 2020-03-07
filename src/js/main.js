

jQuery(function () {

  new WOW().init();

  //topへ戻る
  const pageTop = jQuery('#page_top');
  // ボタン非表示
  pageTop.hide();
  // 100px スクロールしたらボタン表示
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      pageTop.fadeIn('slow');
    } else {
      pageTop.fadeOut('slow');
    }
  });
  pageTop.click(function () {
    jQuery('body, html').animate({ scrollTop: 0 }, 700);
    return false;
  });

});

