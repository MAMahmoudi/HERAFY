var ToolBar = document.getElementById("ToolBar"),
  Profile_Pic = document.getElementById("Profile_Pic");

ToolBar.className = "Account_Page_ToolBar";
ToolBar.children[2].remove();
ToolBar.innerHTML +=
  '<img src="' + Profile_Pic.src + '" class ="Account_Page_Menu_Btn"/>';
