var currentSlide = 0;
var slides = document.getElementsByClassName("slide");
var autoPlayInterval;   // we need to maintain the gap 

// Initial Display
showSlide(currentSlide);

function showSlide(index){
    if(index >= slides.length){
        currentSlide = 0;
    } else if(index<0){
        currentSlide = slides.length - 1;
    } else{
        currentSlide = index;
    }

    for(var i=0; i<slides.length; i++){
        slides[i].style.display = "none";
    }

    slides[currentSlide].style.display = "block";
}

function prevSlide(){
    showSlide(currentSlide-1);
}

function nextSlide(){
    showSlide(currentSlide+1);
}

function toggleAutoPlay(){
    if(autoPlayInterval){
        clearInterval(autoPlayInterval);
        autoPlayInterval = null;
    } else{
        autoPlayInterval = setInterval(nextSlide, 1000);
    }
}