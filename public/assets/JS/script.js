//alert('ana JavaScript');

var Back_Top = document.getElementById("Back_Top"),
  ToolBar = document.getElementById("ToolBar"),
  Body = document.body,
  Doc_Element = document.documentElement,
  Offset = 100,
  Scroll_Position,
  Doc_Height,
  Win_Height,
  SearchServices = document.getElementById("SearchServices"),
  IsFirefox = navigator.userAgent.toLowerCase().indexOf("firefox") > -1,
  Cursor = 0,
  Top_Height = 0;

// Calculate the document height
Doc_Height = Math.max(
  Body.scrollHeight,
  Body.offsetHeight,
  Doc_Element.clientHeight,
  Doc_Element.scrollHeight,
  Doc_Element.offsetHeight
);
if (Doc_Height != "undefined") {
  Offset = Doc_Height / 4;
}

//When scrolling...
window.addEventListener("scroll", function (event) {
  Scroll_Position = Body.scrollTop || Doc_Element.scrollTop;
  console.log(Scroll_Position);
  Back_Top.className = Scroll_Position > Offset ? "visible" : "";
  ToolBar.style.background =
    Scroll_Position > 480 ? "rgba(0, 0, 0, 1)" : "rgba(0, 0, 0, 0.6)";
  if (SearchServices != null) {
    SearchServices.className =
      Scroll_Position > 480 ? "SearchServicesFixed" : "SearchServices";
  }
});

Back_Top.addEventListener("click", function (event) {
  event.preventDefault();
  Doc_Element.scrollTop = 0;
});
