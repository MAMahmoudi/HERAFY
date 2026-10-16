var Slides_Previous_Btn = document.getElementById("Slides_Previous_Btn"),
  Slides_Next_Btn = document.getElementById("Slides_Next_Btn"),
  Slides = document.querySelectorAll(".Slide"),
  Counter = 0,
  Auto_Play = null;

//Sliding Images in Home Page--begin
Slides.forEach((Slide, index) => {
  Slide.style.left = index * 100 + "%";
});

const Slide_Images = () => {
  Slides.forEach((Slide) => {
    Slide.style.transform = "translateX(-" + Counter * 100 + "%)";
  });
};

function Slide_Previous() {
  Counter = Counter <= 0 ? Slides.length - 1 : Counter - 1;
  Slide_Images();
}

function Slide_Next() {
  Counter = Counter >= Slides.length - 1 ? 0 : Counter + 1;
  Slide_Images();
}

// Change the picture every 6 seconds, and restart the timer after a click
function Restart_Auto_Play() {
  clearInterval(Auto_Play);
  Auto_Play = setInterval(Slide_Next, 6000);
}

if (Slides_Previous_Btn && Slides_Next_Btn && Slides.length) {
  Slides_Previous_Btn.addEventListener("click", function () {
    Slide_Previous();
    Restart_Auto_Play();
  });
  Slides_Next_Btn.addEventListener("click", function () {
    Slide_Next();
    Restart_Auto_Play();
  });
  Restart_Auto_Play();
}
//Sliding Images in Home Page--end
