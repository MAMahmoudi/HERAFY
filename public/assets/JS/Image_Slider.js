var Slides_Previous_Btn = document.getElementById("Slides_Previous_Btn"),
  Slides_Next_Btn = document.getElementById("Slides_Next_Btn"),
  SearchServices = document.getElementById("SearchServices"),
  Slides_Container = document.getElementById("Slides_Container"),
  Slides_Width = 0,
  Counter = 0,
  Slides = document.querySelectorAll(".Slide");

//Sliding Images in Home Page--begin
Slides.forEach((Slide, index) => {
  Slide.style.left = index * 100 + "%";
});
const Slide_Images = () => {
  Slides.forEach((Slide) => {
    Slide.style.transform = "translateX(-" + Counter * 100 + "%)";
  });
};

Slides_Previous_Btn.addEventListener("click", Slide_Previous);

function Slide_Previous(event) {
  if (Counter <= 0) return;
  Counter--;
  Slide_Images();
}

Slides_Next_Btn.addEventListener("click", Slide_Next);

function Slide_Next(event) {
  if (Counter >= Slides.length - 1) return;
  Counter++;
  Slide_Images();
}

//Sliding Images in Home Page--end
