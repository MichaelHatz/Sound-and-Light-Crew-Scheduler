var Image_slide = new Array("Image1.jpg", "Image2.jpg", "Image3.jpg", "Image4.jpg", "Image5.jpg");// image container
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
    setInterval(slide, 2000);
}

window.onload = auto;