(function ($) {




  // 햄버거 Content Container Open Close 컨트롤러
  $('a[href="#"]').click(function (e) {
    e.preventDefault();
  });

  let hamburgerButton = $('.hamburger-menu-button img');
  let hamburgerCloseButton = $('.hamburger-close-button img');
  let hamburgerContent = $('.hamburger-content');

  hamburgerButton.on("click", function (e) {
    if (hamburgerContent.hasClass("is-open")) {
      hamburgerContent.removeClass("is-open").addClass("is-closed");
      $('#content').removeClass("limit-height");
    } else {
      hamburgerContent.removeClass("is-closed").addClass("is-open");
      $('#content').addClass("limit-height");
    }
  });

  hamburgerCloseButton.on("click", function (e) {
    if (hamburgerContent.hasClass("is-open")) {
      hamburgerContent.removeClass("is-open").addClass("is-closed");
      $('#content').removeClass("limit-height");
    } else {
      hamburgerContent.removeClass("is-closed").addClass("is-open");
      $('#content').addClass("limit-height");
    }
  });












  let imgPath = 'https://hheerraa.co.kr/wp-content/themes/hera/assets/img';

  var $magnifyIcon = $(`<img class="magnify-icon" src="${imgPath}/magnify_main.png" alt="magnify img">`);

  setTimeout(function () {

    $("a.woocommerce-product-gallery__trigger").prepend($magnifyIcon);



    $('.rbs-img-thumbnail-container img').on('click', function (e) {
      setTimeout(function (e) {

        $('.mfp-arrow.mfp-arrow-right.mfp-prevent-close').css({
          "background-image": `url(${imgPath}/left-white.png) !important`
        });
        // newimg.css({'background-image': 'url('+newimgsrc+')'});
      }, 100);
    })

  }, 200);
  // .mfp-arrow.mfp-arrow-right






  let inputNameSubscribe = $("#subscribe_NAME");
  let inputEmailSubscribe = $("#subscribe_email");

  inputNameSubscribe.on('input', function () {
    if (inputNameSubscribe.hasClass("valid") ||
      inputNameSubscribe.hasClass("invalid")) {
      var input = $(this);
      var is_name = input.val();
      if (is_name) {
        input.removeClass("invalid").addClass("valid");
      } else {
        input.removeClass("valid").addClass("invalid");
      }
    }
  });


  inputEmailSubscribe.on('input', function () {
    if (inputEmailSubscribe.hasClass("valid") ||
      inputEmailSubscribe.hasClass("invalid")) {
      var input = $(this);
      var re = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;
      var is_email = re.test(input.val());
      if (is_email) {
        input.removeClass("invalid").addClass("valid");
      } else {
        input.removeClass("valid").addClass("invalid");
      }
    }
  });

  var validateSubscribe = function (type) {
    if (type === "NAME") {
      var is_name = inputNameSubscribe.val();
      if (is_name) {
        return inputNameSubscribe.removeClass("invalid").addClass("valid");
      } else {
        return inputNameSubscribe.removeClass("valid").addClass("invalid");
      }
    }
    if (type === "email") {
      var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      var is_email = re.test(inputEmailSubscribe.val());
      if (is_email) {
        return inputEmailSubscribe.removeClass("invalid").addClass("valid");
      } else {
        return inputEmailSubscribe.removeClass("valid").addClass("invalid");
      }
    }
  }

  // After Form Submitted Validation

  $("#mc4wp-form-1").submit(function (event) {
    var form_data = $(this).serializeArray();
    var error_free = true;
    for (var input in form_data) {
      validateSubscribe(form_data[input]['name']);
      var element = $("#subscribe_" + form_data[input]['name']);
      var valid = element.hasClass("valid");
      var error_element = $("span", element.parent());
      if (!valid) {
        error_element.removeClass("error").addClass("error_show");
        error_free = false;
      } else {
        error_element.removeClass("error_show").addClass("error");
      }
    }
    if (!error_free) {
      event.preventDefault();
    }
  });




  // 햄버거 메뉴 컨트롤러

  // let hasChildrenMenuItem = $('.menu-item-has-children');

  // hasChildrenMenuItem.attr('tabindex', '-1');

  // var accordion_head = $('.navigation-container-for_handheld_nav_container > .main-navi-menu.accordion > a'),
  //   accordion_body = $('.navigation-container-for_handheld_nav_container .main-navi-menu.accordion > .sub-menu');



  // $('.menu-toggle-customized').on('click', function (e) {
  //   $('.handheld-nav-container').addClass('isVisible');
  //   $('#page').addClass('overflow-hidden');
  // })

  // $('.button-close-for_handheld_nav_container').on('click', function (e) {
  //   $('.handheld-nav-container').removeClass('isVisible');
  //   $('.navigation-container-for_handheld_nav_container > .main-navi-menu.accordion > a.active').next().slideToggle('fast');
  //   $('.navigation-container-for_handheld_nav_container > .main-navi-menu.accordion > a.active').removeClass('active')
  //   $('#page').removeClass('overflow-hidden');
  // });


  // Click function

  // accordion_head.on('click', function (event) {

  //   // Disable header links

  //   event.preventDefault();

  //   // Show and hide the tabs on click

  //   if ($(this).attr('class') != 'active') {
  //     accordion_body.slideUp('normal');
  //     $(this).next().stop(true, true).slideToggle('normal');
  //     accordion_head.removeClass('active');
  //     $(this).addClass('active');
  //   }

  // });













  $(document).ajaxComplete(function () {
    var width = $(window).width();
    if (width < 767) {
      if ($('td.product-name').parent('.td-container').length <= 0) {
        var divs = $(".product-set");
        for (var i = 0; i < divs.length; i += 4) {
          divs.slice(i, i + 4).wrapAll("<td class='td-container' colspan='5'></td>");
        }
      }
    } else if (width > 767) {
      if ($('td.product-name').closest('.td-container').length > 0) {
        $('.product-set').unwrap();
      }
    }




    if (width <= 640) {
      if ($('td.product-name-wishlist').parent('.td-container-wishlist').length <= 0) {
        var divs = $(".product-set-wishlist");
        for (var i = 0; i < divs.length; i += 4) {
          divs.slice(i, i + 4).wrapAll("<td class='td-container-wishlist' colspan='5'></td>");
        }
      }
    } else if (width > 640) {
      if ($('td.product-name-wishlist').closest('.td-container-wishlist').length > 0) {
        $('.product-set-wishlist').unwrap();
      }
    }


  });

  $(window).load(function () {
    var width = $(window).width();
    if (width < 767) {
      // console.log($('td.product-name').parent('.td-container'));
      if ($('td.product-name').parent('.td-container').length <= 0) {
        var divs = $(".product-set");
        for (var i = 0; i < divs.length; i += 4) {
          divs.slice(i, i + 4).wrapAll("<td class='td-container' colspan='5'></td>");
        }
      }
    } else if (width > 767) {
      if ($('td.product-name').closest('.td-container').length > 0) {
        $('.product-set').unwrap();
      }
    }

    if (width <= 640) {
      if ($('td.product-name-wishlist').parent('.td-container-wishlist').length <= 0) {
        var divs = $(".product-set-wishlist");
        for (var i = 0; i < divs.length; i += 4) {
          divs.slice(i, i + 4).wrapAll("<td class='td-container-wishlist' colspan='5'></td>");
        }
      }
    } else if (width > 640) {
      if ($('td.product-name-wishlist').closest('.td-container-wishlist').length > 0) {
        $('.product-set-wishlist').unwrap();
      }
    }
  });

  $(window).resize(function () {
    var width = $(window).width();
    if (width < 767) {
      // console.log($('td.product-name').parent('.td-container'));
      if ($('td.product-name').parent('.td-container').length <= 0) {
        var divs = $(".product-set");
        for (var i = 0; i < divs.length; i += 4) {
          divs.slice(i, i + 4).wrapAll("<td class='td-container' colspan='5'></td>");
        }
      }
    } else if (width > 767) {
      if ($('td.product-name').closest('.td-container').length > 0) {
        $('.product-set').unwrap();
      }
    }

    if (width <= 640) {
      if ($('td.product-name-wishlist').parent('.td-container-wishlist').length <= 0) {
        var divs = $(".product-set-wishlist");
        for (var i = 0; i < divs.length; i += 4) {
          divs.slice(i, i + 4).wrapAll("<td class='td-container-wishlist' colspan='5'></td>");
        }
      }
    } else if (width > 640) {
      if ($('td.product-name-wishlist').closest('.td-container-wishlist').length > 0) {
        $('.product-set-wishlist').unwrap();
      }
    }
  });








  class Accordion {
    constructor(options) {
      // 기본 옵션과 사용자 지정 옵션을 병합
      this.config = Accordion.mergeConfig(options);
      this.$accordion = document.querySelector(this.config.selector);

      this.init();
      // 이벤트 핸들러 내부의 this는 currentTartget
      this.$accordion.addEventListener('click', this.toogle.bind(this));
    }

    static mergeConfig(options) {
      // 기본 옵션
      const config = {
        selector: '#accordion',
        multi: true
      };

      return {
        ...config,
        ...options
      };
    }

    init() {
      // active 클래스가 지정된 li 요소
      const $ActiveSubmenu = this.$accordion.querySelector('.active .submenu');
      // active 클래스가 지정된 li 요소를 노출시킨다.
      if ($ActiveSubmenu) $ActiveSubmenu.style.height = $ActiveSubmenu.scrollHeight + 'px';
    }

    toogle(event) {
      if (!event.target.classList.contains('menu')) return;
      // click 이벤트를 발생시킨 <div class="menu"> 요소의 부모 요소인 li 요소
      const $targetItem = event.target.parentNode;

      // 멀티 오픈을 허용하지 않으면 타깃 이외의 모든 submenu를 클로즈한다.
      if (!this.config.multi) {
        [].filter.call(
          this.$accordion.childNodes,
          li => li.nodeType === Node.ELEMENT_NODE && li !== $targetItem && li.classList.contains('active')
        ).forEach(li => {
          li.classList.remove('active');
          li.querySelector('.submenu').style.height = '0';
        });
      }

      // 타깃 li 요소의 active class를 토글한다.
      $targetItem.classList.toggle('active');
      // 타깃 li 요소의 submenu
      const $submenu = $targetItem.querySelector('.submenu');
      // 타깃 li 요소의 submenu를 토글한다.
      $submenu.style.height = $targetItem.classList.contains('active') ? $submenu.scrollHeight + 'px' : '0';
    }
  }

  window.onload = function () {
    const accordion = new Accordion({
      multi: true
    });
  };










  // 네비게이션 드롭다운 메뉴 컨트롤

  $("#menu-main-menu li:has(ul.sub-menu)").hover(function () {
    $(this).children("a").click(function (e) {
      e.preventDefault();
      return false;
    });
  });

  $('#menu-main-menu li.menu-item').each(function (e) {
    var $dropdown = $(this);
    if ($dropdown.hasClass('menu-item-has-children') === false) {
      return true;
    }
    $("a", $dropdown).click(function (e) {
      $div = $("ul.sub-menu", $dropdown);
      return $div.slideToggle(400);
    });

  });

  $('#menu-main-menu-1 li.menu-item').each(function () {
    var $dropdown = $(this);
    if ($dropdown.hasClass('menu-item-has-children') === false) {
      return true;
    }
    $("a", $dropdown).click(function (e) {
      $div = $("ul.sub-menu", $dropdown);
      return $div.slideToggle(400);
    });

  });

  $('ul.sub-menu').each(function () {
    if ($(this).children('.current-menu-item').length > 0) {
      return $(this).css('display', 'block');
    }
  })












  // setTimeout(function() {
  //   if ($('ul.woocommerce-error').length > 0) {
  //     $('.woocommerce-error').fadeOut(400);
  //   }
  //   $('.woocommerce-message', '.woocommerce-info', '.woocommerce-error').fadeOut(400) 
  // }, 3000);




  $(".set > a").on("click", function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this)
        .siblings(".content")
        .slideUp(200);
      $(".set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
    } else {
      $(".set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
      $(this)
        .find("i")
        .removeClass("fa-plus")
        .addClass("fa-minus");
      $(".set > a").removeClass("active");
      $(this).addClass("active");
      $(".content").slideUp(200);
      $(this)
        .siblings(".content")
        .slideDown(200);
    }
  });



})(jQuery);