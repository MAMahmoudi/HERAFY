//alert('ana JavaScript');

var Back_Top = document.getElementById("Back_Top"),
  Slides_Previous_Btn = document.getElementById("Slides_Previous_Btn"),
  Slides_Next_Btn = document.getElementById("Slides_Next_Btn"),
  SearchServices = document.getElementById("SearchServices"),
  ToolBar = document.getElementById("ToolBar"),
  Body = document.body,
  Doc_Element = document.documentElement,
  Offset = 100,
  Scroll_Position,
  Doc_Height,
  Win_Height,
  IsFirefox = navigator.userAgent.toLowerCase().indexOf("firefox") > -1,
  Search_Craftsman_Service = document.getElementById("SearchServicesTxtField"),
  AutoComplete_Results = document.getElementById("AutoComplete_Results"),
  Matches = [],
  Result_Cursor = 0,
  Slides_Container = document.getElementById("Slides_Container"),
  Cursor = 0,
  Counter = 0,
  Slides_Width = 0,
  Top_Height = 0,
  Service_List = [
    "Plumber",
    "Electrician",
    "Carpenter",
    "Painter",
    "Mason",
    "Welder",
    "Mechanic",
    "Gardener",
    "Cleaner",
    "Cook",
    "Driver",
    "Security Guard",
    "Baby Sitter",
    "Nurse",
    "Tutor",
    "Beautician",
    "Hair Dresser",
    "Tailor",
    "Laundry",
    "Other",
  ],
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

Slides_Previous_Btn.addEventListener("click", function (event) {
  if (Counter <= 0) return;
  Counter--;
  Slide_Images();
});
Slides_Next_Btn.addEventListener("click", function (event) {
  if (Counter >= Slides.length - 1) return;
  Counter++;
  Slide_Images();
});
//Sliding Images in Home Page--end

// Calculate the document height
Doc_Height = Math.max(
  Body.scrollHeight,
  Body.offsetHeight,
  Doc_Element.clientHeight,
  Doc_Element.scrollHeight,
  Doc_Element.offsetHeight
);
if (Doc_Height != "undefined") {
  Offset = Doc_Height / 3;
}

//When scrolling...
window.addEventListener("scroll", function (event) {
  Scroll_Position = Body.scrollTop || Doc_Element.scrollTop;
  //console.log(Scroll_Position);
  Back_Top.className = Scroll_Position > Offset ? "visible" : "";
  SearchServices.className =
    Scroll_Position > 480 ? "SearchServicesFixed" : "SearchServices";
  ToolBar.style.background =
    Scroll_Position > 480 ? "rgba(0, 0, 0, 1)" : "rgba(0, 0, 0, 0.6)";
});

Back_Top.addEventListener("click", function (event) {
  event.preventDefault();
  Doc_Element.scrollTop = 0;
});

Search_Craftsman_Service.focus();

Search_Craftsman_Service.addEventListener("keyup", function (event) {
  AutoComplete_Results.innerHTML = "";
  Toggle_AutoComplete_Results("Hide");

  if (Search_Craftsman_Service.value.length > 0) {
    if (this.value.length > 0) {
      Matches = GetMatches(this.value);
      if (Matches.length > 0) {
        Display_Matches(Matches);
      }
    }
  }

  switch (event.key) {
    case "ArrowUp":
      if (Result_Cursor > 0) {
        Result_Cursor--;
        Move_Cursor(Result_Cursor);
      }
      break;
    case "ArrowDown":
      if (Result_Cursor < AutoComplete_Results.children.length - 1) {
        Result_Cursor++;
        Move_Cursor(Result_Cursor);
      }
      break;
    case "Enter":
      SearchServicesTxtField.value =
        AutoComplete_Results.children[Result_Cursor].innerHTML;
      Toggle_AutoComplete_Results("Hide");
      Result_Cursor = 0;
      break;
  }
});

function Toggle_AutoComplete_Results(Action) {
  if (Action === "Show") {
    AutoComplete_Results.style.display = "block";
  } else if (Action === "Hide") {
    AutoComplete_Results.style.display = "none";
  }
}

function GetMatches(Search_Text) {
  var Matched_Services = [];
  for (var i = 0; i < Service_List.length; i++) {
    if (
      Service_List[i].toLowerCase().indexOf(Search_Text.toLowerCase()) != -1
    ) {
      Matched_Services.push(Service_List[i]);
    }
  }
  return Matched_Services;
}

function Display_Matches(Matched_Services) {
  var j;
  for (j = 0; j < Matched_Services.length; j++) {
    AutoComplete_Results.innerHTML +=
      '<li class="AutoComplete_Result_Items">' + Matched_Services[j] + "</li>";
  }

  Move_Cursor(Result_Cursor);

  Toggle_AutoComplete_Results("Show");
}

function Move_Cursor(Position) {
  for (var x = 0; x < AutoComplete_Results.children.length; x++) {
    AutoComplete_Results.children[x].classList.remove(
      "AutoComplete_Result_Items_Selected"
    );
  }
  AutoComplete_Results.children[Position].classList.add(
    "AutoComplete_Result_Items_Selected"
  );
}
