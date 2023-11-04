$(function () {

  $(".accordion-header").click(function () {
    $(this).toggleClass("active").next().slideToggle("fast");

    // アコーディオンが開いているかどうかを判断してアイコンを切り替える
    if ($(this).hasClass("active")) {
      $(this).find("::after").css("content", "\f106"); // 上向き矢印のUnicodeコードポイント
    } else {
      $(this).find("::after").css("content", "\f107"); // 下向き矢印のUnicodeコードポイント
    }
  });

  $('.subject_edit_btn').click(function () {
    $(this).toggleClass("active").next().slideToggle("fast");

    if ($(this).hasClass("active")) {
      $(this).find("::after").css("content", "\f106"); // 上向き矢印のUnicodeコードポイント
    } else {
      $(this).find("::after").css("content", "\f107"); // 下向き矢印のUnicodeコードポイント
    }
  });

});
