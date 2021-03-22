jQuery(function () {
  hamburgerMenu();
  updateCart();
  heroSlider();
  testimonialsSlider();
  cookies();
  accordion();
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
  const slides = document.querySelector(".numberOfSlides");
  if(slides){
    const numOfSlides = slides.dataset.slides;
    $(".hero-slider .slider-wrapper").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: ".slider-titles",
    });
    $(".slider-titles").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: ".hero-slider .slider-wrapper",
      focusOnSelect: true,
      infinite: true,
    });
    $(".hero-slider .slider-arrow__wrapper--left").click(function () {
      $(".hero-slider .slider-wrapper").slick("slickPrev");
    });
  
    $(".hero-slider .slider-arrow__wrapper--right").click(function () {
      $(".hero-slider .slider-wrapper").slick("slickNext");
    });
  }
}
function testimonialsSlider() {
  $(".testimonials-slider .slider-wrapper").slick({
    arrows: false,
    autoplay: false,
    autoplaySpeed: 4500,
    infinite: true,
    dots: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    slidesToShow: 2,
    slidesToScroll: 1,
  });
  $(".testimonials-slider .slider-arrow__wrapper--left").click(function () {
    $(".testimonials-slider .slider-wrapper").slick("slickPrev");
  });

  $(".testimonials-slider .slider-arrow__wrapper--right").click(function () {
    $(".testimonials-slider .slider-wrapper").slick("slickNext");
  });
}
function cookies() {
  const cookieStorage = {
    getItem: (item) => {
      const cookies = document.cookie
        .split(";")
        .map((cookie) => cookie.split("="))
        .reduce((acc, [key, value]) => ({ ...acc, [key.trim()]: value }), {});
      return cookies[item];
    },
    setItem: (item, value) => {
      document.cookie = `${item}=${value};`;
    },
  };

  const storageType = cookieStorage;
  const consentPropertyName = "cookie_consent";
  const shouldShowPopup = () => !storageType.getItem(consentPropertyName);
  const saveToStorage = () => storageType.setItem(consentPropertyName, true);

  window.onload = () => {
    const acceptFn = (event) => {
      saveToStorage(storageType);
      consentPopup.classList.add("hidden");
    };
    const consentPopup = document.getElementById("consent-popup");
    const acceptBtn = document.getElementById("cookie-box-accept");
    acceptBtn.addEventListener("click", acceptFn);

    if (shouldShowPopup(storageType)) {
      setTimeout(() => {
        consentPopup.classList.remove("hidden");
      }, 2000);
    }
  };
}
function accordion() {
  var faqFields = document.querySelectorAll(".faq-fields__single");
  if (faqFields.length > 0) {
    faqFields[0].classList.add("faq-fields__single--active");
    faqFields[0].firstElementChild.classList.toggle(
      "faq-fields__toggler--close"
    );
    faqFields.forEach(function (field) {
      field.addEventListener("click", function (el) {
        this.classList.toggle("faq-fields__single--active");
        this.firstElementChild.classList.toggle("faq-fields__toggler--close");
      });
    });
  }
}