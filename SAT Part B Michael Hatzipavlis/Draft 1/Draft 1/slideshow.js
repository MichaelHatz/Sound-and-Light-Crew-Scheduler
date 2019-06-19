var Image_slide = new Array("download.jpg", "picture.jpg");// image container
var Img_Length  = Image_slide.length; // container length - 1
var Img_current = 0


function slide() {
    if(Img_current >= Img_Length) {
        Img_current = 0;
    }
    document.getElementById("parallax").style.backgroundImage = `url(${Image_slide[Img_current]})`;
    Img_current++;
}

function auto(){
    setInterval(slide, 1000);
}

window.onload = auto;