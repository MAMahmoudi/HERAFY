<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/styles.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <header class="ToolBar">
        <a href=<?= My_Files_Root ?> class="Logo">
            <div style="display: flex; flex-direction: row; font-size: large; padding-bottom:0px; margin-left: 50px; text-decoration:none;">
                <h1 style="color: white; margin:0px;">Foo</h1>
                <h1 style="color: red; margin:0px;">dz</h1>
            </div>
        </a>

        <nav class="NavBar">
            <button class="NavBarBtn">Products</button>
            <button class="NavBarBtn">Restaurents</button>
            <button class="NavBarBtn">Café</button>
        </nav>

        <div class="ToolBarBtn">
            <input type="text" placeholder="Search for your favorite restaurant or dish" class="ToolBarSearch">
        </div>

    </header>
</body>

</html>