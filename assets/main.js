var video = document.getElementById("video");

function toggleControls() {

   video.setAttribute("controls","controls");
   video.play()
   video.volume = 0.5;   

  video.classList.remove("blurred");

  document.getElementsByClassName('section-discover__video-overlay')[0].style.visibility='hidden';
}