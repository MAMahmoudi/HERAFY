var ToolBar = document.getElementById("ToolBar"),
  Login_Btn = document.getElementById("Login_Btn"),
  Profile_Pic = document.getElementById("Profile_Pic");

ToolBar.className = "Account_Page_ToolBar";
//Login_Btn.className = "";
Login_Btn.innerHTML =
  "<img src=" +
  Profile_Pic.src +
  ' class ="Account_Page_Menu_Btn_Img" id="Account_Page_Menu_Btn_Img" />';
Login_Btn.className = "Account_Page_Menu_Btn";
Login_Btn.innerHTML +=
  ' <ul class="Account_Page_Drop_Down_Menu">' +
  ' <li><a href="<?= My_Files_Root ?>Register_Account"> <img src="../public/assets/IMAGES/setting.png" alt="setting"><p>ketba</p><span>>  </span></a></li>' +
  ' <li><a href="<?= My_Files_Root ?>Register_Account"> <img src="../public/assets/IMAGES/help.png" alt="help"><p>ketba</p><span>>  </span></a></li>' +
  ' <li><a href="<?= My_Files_Root ?>Register_Account"> <img src="../public/assets/IMAGES/display.png" alt="setting"><p>ketba</p><span>>  </span></a></li>' +
  ' <li><a href="<?= My_Files_Root ?>Register_Account"> <img src="../public/assets/IMAGES/logout.png" alt="setting"><p>ketba</p><span>>  </span></a></li>' +
  "</ul>";
