var video = document.getElementById("video");

function toggleControls() {

   video.setAttribute("controls","controls");
   video.play()
   video.volume = 0.5;   

  video.classList.remove("blurred");

  document.getElementsByClassName('section-discover__video-overlay')[0].style.visibility='hidden';
}

jQuery(document).ready(function() {
    jQuery('.info').mouseover(function(){
        var tooltip = jQuery(this).children('.info-tooltip');
        var height = jQuery(tooltip).outerHeight() + 10;
        var left = jQuery(this).siblings('.info-text').outerWidth();
        jQuery(tooltip).css({'top': "-" + height + 'px', 'left': "-" + left + 'px'});
    });

    jQuery('.info').click(function(){
        var tooltip = jQuery(this).children('.info-tooltip');
        var height = jQuery(tooltip).outerHeight() + 10;
        var left = jQuery(this).siblings('.info-text').outerWidth();
        jQuery(tooltip).css({'top': "-" + height + 'px', 'left': "-" + left + 'px'});
    });
});