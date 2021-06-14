var video = document.getElementById("video");

function toggleControls() {

   video.setAttribute("controls","controls");
   video.play()
   video.volume = 0.5;   

  video.classList.remove("blurred");

  document.getElementsByClassName('section-discover__video-overlay')[0].style.visibility='hidden';
}


window.addEventListener("load", function () {
    var logo = document.getElementsByClassName("section-feature__grid-container");
    for (var i = 0; i < logo.length; i++) {
        logo[i].addEventListener("click", function () {
            var id = this.getAttribute("data-number");

            var links = document.querySelectorAll('.section-feature__grid-container');
            for (var i = 0; i < links.length; i++) {
                links[i].classList.remove('section-feature__grid-container--active');
            }

            this.classList.add("section-feature__grid-container--active");

            
            
            var elements = document.querySelectorAll('.subsection-solutions');
            for (var i = 0; i < elements.length; i++) {
                elements[i].classList.remove('subsection-solutions--show');
            }

            const show = document.querySelector('.subsection-solutions[data-number="' + id +'"]');
            if (!show.classList.contains("subsection-solutions--show")) {
                show.classList.add("subsection-solutions--show");
            }

           
        });
    }
});