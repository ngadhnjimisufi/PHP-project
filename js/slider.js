var index = 1;

function slides(n) {
  index+=n;

  var i;
  var slides = document.getElementsByClassName("fade");

  if(index<1){
    index=slides.length;
  }
  else if (index>slides.length)
    index=1


  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  
  slides[index-1].style.display = "block";
}

