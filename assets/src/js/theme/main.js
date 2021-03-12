jQuery(function () {
  hamburgerMenu();
  updateCart();
  heroSlider();
});
function hamburgerMenu() {
  const hamburger = document.querySelector(".hamburger");
  const header = document.querySelector(".header-mobile");
  const headerBottom = document.querySelector(".header-mobile__bottom");
  hamburger.addEventListener("click", function (el) {
    this.classList.toggle("is-active");
    header.classList.toggle("header-mobile--visible");
    headerBottom.classList.toggle("header-mobile__bottom--visible");
    bodyClass.classList.toggle("stop-scroll");
  });
}

function updateCart() {
  var timeout;

  jQuery(function ($) {
    $(".woocommerce").on("change", "input.qty", function () {
      if (timeout !== undefined) {
        clearTimeout(timeout);
      }

      timeout = setTimeout(function () {
        $("[name='update_cart']").trigger("click");
      }, 500); // 1 second delay, half a second (500) seems comfortable too
    });
  });
}
function heroSlider() {
  $(".hero-slider .slider-wrapper").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false
  });
  $('.slider-arrow__wrapper--left').click(function(){
    $('.hero-slider .slider-wrapper').slick('slickPrev');
  })
  
  $('.slider-arrow__wrapper--right').click(function(){
    $('.hero-slider .slider-wrapper').slick('slickNext');
  })
}
