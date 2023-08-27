var Search_Craftsman_Service = document.getElementById(
    "SearchServicesTxtField"
  ),
  AutoComplete_Results = document.getElementById("AutoComplete_Results"),
  Matches = [],
  Result_Cursor = 0,
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
