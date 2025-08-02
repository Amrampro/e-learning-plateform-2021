// Opening folders(Modals)
function openVideos(){
  var fol = document.getElementById("videos_content");
  fol.style.display="block";
}
function openImages(){
  var fol = document.getElementById("image_content");
  fol.style.display="block";
}
function openAudios(){
  var fol = document.getElementById("audio_content");
  fol.style.display="block";
}
function openDocuments(){
  var fol = document.getElementById("document_content");
  fol.style.display="block";
}

// Closing folders(Modals)
function close_vid(){
  var fol = document.getElementById("videos_content");
  fol.style.display="none";
}
function close_im(){
  var fol = document.getElementById("image_content");
  fol.style.display="none";
}
function close_aud(){
  var fol = document.getElementById("audio_content");
  fol.style.display="none";
}
function close_doc(){
  var fol = document.getElementById("document_content");
  fol.style.display="none";
}
