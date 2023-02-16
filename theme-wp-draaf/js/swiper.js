var slider1 = new Swiper('.slider1', {
    slidesPerView: 'auto',
    slidesPerGroup: 1,
    autoplay: {
      delay: 6000,
    },
    pauseOnMouseEnter: true,
    disableOnInteraction: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      1024: {
        slidesPerView: 5,
        slidesPerGroup: 5,
      }
    }
});

var slider2 = new Swiper('.slider2', {
    slidesPerView: 'auto',
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      1024: {
        slidesPerView: 2,
      }
    }
});

var slider3 = new Swiper('.slider3', {
    slidesPerView: 'auto',
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
      }
    }
});

var slider4 = new Swiper('.slider4', {
    slidesPerView: 'auto',
    slidesPerGroup: 1,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      1024: {
        slidesPerGroup: 3,
        spaceBetween: 24,
      }
    },
});

var slider5 = new Swiper('.slider-mobile', {
  slidesPerView: 'auto',
  breakpoints: 
  {
    600: {
      slidesPerView: 3,
    },
    800: {
      slidesPerView: 5,
    }
  }
});