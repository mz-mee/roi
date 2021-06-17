const swiper = new Swiper('#client_slider', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    autoHeight: true,
    spaceBetween: 12,
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
          el: ".swiper-pagination",
        },

    });

    const feature_swiper = new Swiper('#feature-slider', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        autoHeight: true,
        spaceBetween: 12,
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: ".swiper-pagination",
        },
        autoplay: {
            delay: 4000,
        },
        on: {
            slideChange: function (swiper){
                var controls = document.getElementsByClassName("section-feature__grid-container");
                for (var i = 0; i < controls.length; i++) {
                    controls[i].classList.remove('section-feature__grid-container--active');
                    var id = controls[i].getAttribute("data-number");
                    if(swiper.realIndex == id){
                        controls[i].classList.add('section-feature__grid-container--active');
                    }
                }
            },
        }
    });

    window.addEventListener("load", function () {
        var logo = document.getElementsByClassName("section-feature__grid-container");
        for (var i = 0; i < logo.length; i++) {
            logo[i].addEventListener("click", function () {
                var id = this.getAttribute("data-number");
                feature_swiper.slideToLoop(parseInt(id));
            });
        }
    });

