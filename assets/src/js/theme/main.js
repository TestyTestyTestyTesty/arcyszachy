jQuery(function () {
  hamburgerMenu();
  playVideo();
  scrollToSection();
  accordion();
  productTabs();
  archiveCategoryScroll();
  updateCart();
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
function playVideo() {
  const video = document.querySelector(".two-columns-video .video");
  if (video != null) {
    const playIcon = document.querySelector(".video__play--wrapper");
    var startVideo = function () {
      playIcon.classList.add("video__play--hide");
      video.play();
      video.removeEventListener("click", startVideo, false);
    };
    video.addEventListener("click", startVideo, false);
  }
}
function scrollToSection() {
  const arrow = document.querySelector(".hero__arrow--wrapper");
  if (arrow != null) {
    $(arrow).click(function () {
      $("html, body").animate(
        {
          scrollTop: $("#features").offset().top,
        },
        1500
      );
    });
  }
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

function productTabs() {
  const tabs = document.querySelectorAll(".product-details-switcher__item");
  const descriptionParts = document.querySelectorAll(".product-tab");
  tabs.forEach(function (tab) {
    tab.addEventListener("click", function (el) {
      tabs.forEach((tab) => {
        tab.classList.remove("product-details-switcher__item--active");
      });
      this.classList.add("product-details-switcher__item--active");
      let tabActive = this.dataset.tab;
      let descriptionActive = document.querySelector(`.${tabActive}`);
      descriptionParts.forEach(function (part) {
        part.classList.remove("product-tab__visible");
      });
      descriptionActive.classList.add("product-tab__visible");
    });
  });
}
function archiveCategoryScroll() {
  let menuItems = document.querySelectorAll(".archive-menu__item");
  menuItems.forEach(function (item) {
    item.addEventListener("click", function () {
      let category = this.dataset.menuCategory;
      $("html, body").animate(
        {
          scrollTop: $(`#products-${category}`).offset().top - 200,
        },
        1000
      );
    });
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
