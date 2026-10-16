// Auto complete of the search field of the home page.
// The list of services comes from the database (data-services attribute).
var Search_Craftsman_Service = document.getElementById("SearchServicesTxtField"),
  AutoComplete_Results = document.getElementById("AutoComplete_Results"),
  Service_List = [],
  Matches = [],
  Result_Cursor = 0;

if (Search_Craftsman_Service && AutoComplete_Results) {
  try {
    Service_List = JSON.parse(Search_Craftsman_Service.getAttribute("data-services")) || [];
  } catch (error) {
    Service_List = [];
  }

  Search_Craftsman_Service.addEventListener("input", function () {
    Result_Cursor = 0;
    Matches = this.value.trim().length > 0 ? GetMatches(this.value.trim()) : [];
    Display_Matches(Matches);
  });

  Search_Craftsman_Service.addEventListener("keydown", function (event) {
    if (!Matches.length || AutoComplete_Results.style.display !== "block") {
      return;
    }
    switch (event.key) {
      case "ArrowUp":
        event.preventDefault();
        Result_Cursor = Math.max(0, Result_Cursor - 1);
        Move_Cursor(Result_Cursor);
        break;
      case "ArrowDown":
        event.preventDefault();
        Result_Cursor = Math.min(Matches.length - 1, Result_Cursor + 1);
        Move_Cursor(Result_Cursor);
        break;
      case "Enter":
        event.preventDefault();
        Open_Service(Matches[Result_Cursor]);
        break;
      case "Escape":
        Toggle_AutoComplete_Results("Hide");
        break;
    }
  });

  // Hide the list when clicking somewhere else
  document.addEventListener("click", function (event) {
    if (event.target !== Search_Craftsman_Service) {
      Toggle_AutoComplete_Results("Hide");
    }
  });
}

function Toggle_AutoComplete_Results(Action) {
  AutoComplete_Results.style.display = Action === "Show" ? "block" : "none";
}

function GetMatches(Search_Text) {
  Search_Text = Search_Text.toLowerCase();
  return Service_List.filter(function (Service) {
    return (
      Service.name.toLowerCase().indexOf(Search_Text) !== -1 ||
      Service.slug.toLowerCase().indexOf(Search_Text) !== -1
    );
  });
}

function Display_Matches(Matched_Services) {
  AutoComplete_Results.innerHTML = "";
  if (!Matched_Services.length) {
    Toggle_AutoComplete_Results("Hide");
    return;
  }
  Matched_Services.forEach(function (Service) {
    var Item = document.createElement("li");
    Item.className = "AutoComplete_Result_Items";
    Item.textContent = Service.name;
    Item.addEventListener("click", function () {
      Open_Service(Service);
    });
    AutoComplete_Results.appendChild(Item);
  });
  Move_Cursor(Result_Cursor);
  Toggle_AutoComplete_Results("Show");
}

function Move_Cursor(Position) {
  Array.prototype.forEach.call(AutoComplete_Results.children, function (Item, Index) {
    Item.classList.toggle("AutoComplete_Result_Items_Selected", Index === Position);
  });
}

function Open_Service(Service) {
  window.location.href =
    Search_Craftsman_Service.getAttribute("data-search-url") + "?service=" + Service.id;
}
