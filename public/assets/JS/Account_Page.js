var ToolBar = document.getElementById("ToolBar"),
  Logo = document.getElementById("Logo"),
  Profile_Pic = document.getElementById("Profile_Pic");

ToolBar.className = "Account_Page_ToolBar";
Logo.src = Profile_Pic.src;
ToolBar.children[2].remove();
ToolBar.innerHTML += '<button class="Login_Btn">تسجيل الخروج</button>';
