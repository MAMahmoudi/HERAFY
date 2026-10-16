var Back_Top = document.getElementById("Back_Top"),
  ToolBar = document.getElementById("ToolBar"),
  SearchServices = document.getElementById("SearchServices"),
  Flash_Messages = document.getElementById("Flash_Messages"),
  Doc_Element = document.documentElement,
  Offset = 100;

// Show the "back to top" button after a quarter of the page
var Doc_Height = Math.max(
  document.body.scrollHeight,
  document.body.offsetHeight,
  Doc_Element.clientHeight,
  Doc_Element.scrollHeight,
  Doc_Element.offsetHeight
);
if (Doc_Height) {
  Offset = Doc_Height / 4;
}

//When scrolling...
window.addEventListener("scroll", function () {
  var Scroll_Position = document.body.scrollTop || Doc_Element.scrollTop;
  if (Back_Top) {
    Back_Top.className = Scroll_Position > Offset ? "visible" : "";
  }
  if (ToolBar) {
    ToolBar.style.background =
      Scroll_Position > 480 ? "rgba(0, 0, 0, 1)" : "rgba(0, 0, 0, 0.6)";
  }
  if (SearchServices != null) {
    SearchServices.className =
      Scroll_Position > 480 ? "SearchServicesFixed" : "SearchServices";
  }
});

if (Back_Top) {
  Back_Top.addEventListener("click", function (event) {
    event.preventDefault();
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
}

// Hide the flash messages after a few seconds
if (Flash_Messages) {
  setTimeout(function () {
    Flash_Messages.style.opacity = "0";
    setTimeout(function () {
      Flash_Messages.remove();
    }, 600);
  }, 5000);
}

// Show the name of the chosen picture in the post forms
document.querySelectorAll(".Post_Image_Input").forEach(function (Input) {
  Input.addEventListener("change", function () {
    var Label = Input.parentElement.querySelector("span");
    Label.textContent = Input.files.length
      ? Input.files[0].name
      : Label.getAttribute("data-default");
  });
});
