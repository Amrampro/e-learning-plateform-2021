var winPlayer = document.getElementById("musicplayer_window");
winPlayer.style.display="none";
var audio = document.getElementById("audio");
var playPause_btn = document.getElementById("playPause_btn");
var count = 0;

function playPause(){
  if (count == 0) {
    count = 1;
    audio.play();
    playPause_btn.innerHTML = '<i class="fas fa-pause"></i>';
  } else {
    count = 0;
    audio.pause();
    playPause_btn.innerHTML = '<i class="fas fa-play"></i>';
  }
}
function stop(){
  playPause();
  audio.pause();
  audio.currentTime = 0;
  playPause_btn.innerHTML = '<i class="fas fa-play"></i>';
}
function openMp3Player(){
  winPlayer.style.display="block";
}
function closeMp3Player(){
  playPause();
  audio.pause();
  audio.currentTime = 0;
  playPause_btn.innerHTML = '<i class="fas fa-play"></i>';
  winPlayer.style.display="none";
}
function minimizeMp3Player(){
  winPlayer.style.display="none";
}
