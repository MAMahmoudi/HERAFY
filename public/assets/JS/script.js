//alert('ana JavaScript');

var Back_Top = document.getElementById("Back_Top"),
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
  Slides = document.getElementsByClassName("Slides"),
  Slides_Container = document.getElementById("Slides_Container"),
  Cursor = 0,
  Slides_Width = 0,
  Top_Height = 0,
  Slides_Count = Slides.length,
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
  ];

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

window.addEventListener("scroll", function (event) {
  Scroll_Position = Body.scrollTop || Doc_Element.scrollTop;
  Back_Top.className = Scroll_Position > Offset ? "visible" : "";
});

Back_Top.addEventListener("click", function (event) {
  event.preventDefault();
  Doc_Element.scrollTop = 0;
  /*
    if (IsFirefox) {
        Doc_Element.scrollTop = 0;
    } else {
        Body.scrollTop = 0;
    }*/
});

Search_Craftsman_Service.focus();

Search_Craftsman_Service.addEventListener("keyup", function (event) {
  AutoComplete_Results.innerHTML = "";
  Toggle_AutoComplete_Results("Hide");

  if (Search_Craftsman_Service.value.length > 0) {
    Matches = GetMatches(this.value);
    if (Matches.length > 0) {
      Display_Matches(Matches);
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

  /*
    var i;
    if (event.keyCode === 13) {
        event.preventDefault();
        for (i = 0; i < Service_List.length; i++) {
            if (Search_Craftsman_Service.value === Service_List[i]) {
                window.location.href = 'http://localhost:3000/Service/' + Service_List[i];
            }
        }
    }*/
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
/*
if (Slides_Count > 0) {
  Slides_Width = Slides[0].offsetWidth;
  for (var i = 0; i < Slides_Count; i++) {
    Slides[i].style.left = Slides_Width * i + "px";
  }

  Calculate_Tallest_Slide();

  for (var i = 0; i < Slides_Count; i++) {
    Slides[i].classList.add("Animated");
  }

  document.getElementById("Next").addEventListener("click", function (event) {
    event.preventDefault();
    if (Cursor < Slides_Count - 1) {
      Move_Slides("Forward");
      Cursor++;
    }
  });

  document
    .getElementById("Previous")
    .addEventListener("click", function (event) {
      event.preventDefault();
      if (Cursor > 0) {
        Move_Slides("Backward");
        Cursor--;
      }
    });

  window.addEventListener("resize", function (event) {
    Slides_Width = Slides[0].offsetWidth;
    for (var i = 0; i < Slides_Count; i++) {
      if (i <= Cursor) {
        Slides[i].style.left = "-" + Slides_Width * (Cursor - i) + "px";
      } else if (i > Cursor) {
        Slides[i].style.left = Slides_Width * (i - Cursor) + "px";
      }
    }
    Calculate_Tallest_Slide();
  });
}

function Calculate_Tallest_Slide() {
  for (var i = 0; i < Slides_Count; i++) {
    if (Slides[i].offsetHeight > Top_Height) {
      Top_Height = Slides[i].offsetHeight;
    }
  }
  Slides_Container.style.height = Top_Height + "px";
}

function Move_Slides(Direction) {
  for (var i = 0; i < Slides_Count; i++) {
    if (Direction === "Forward") {
      Slides[i].style.left =
        +Slides[i].style.left.replace(/[^-\d\.]/g, "") - Slides_Width + "px";
    } else if (Direction === "Backward") {
      Slides[i].style.left =
        +Slides[i].style.left.replace(/[^-\d\.]/g, "") + Slides_Width + "px";
    }
  }
}*/
