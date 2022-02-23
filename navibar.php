
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<style>
    /*button design*/
    .menu-btn {
        position: fixed;
        top: 10px;
        left: 10px;
        display: flex;
        height: 60px;
        width: 60px;
        justify-content: center;
        align-items: center;
        z-index: 90;
        background-color: #F9DCD4;
    }
    .menu-btn span,
    .menu-btn span:before,
    .menu-btn span:after {
        content: '';
        display: block;
        height: 2px;
        width: 25px;
        border-radius: 3px #000;
        background-color: #000000;
        position: absolute;
    }
    .menu-btn span:before {
        bottom: 8px;
    }
    .menu-btn span:after {
       top: 8px;
    }

    /*clicked design*/
    #menu-btn-check:checked ~ .menu-btn span {
        background-color: rgba(0, 0, 0, 0);
    }
    #menu-btn-check:checked ~ .menu-btn span::before {
        bottom: 0;
        transform: rotate(45deg);
    }
    #menu-btn-check:checked ~ .menu-btn span::after {
        top: 0;
        transform: rotate(-45deg);
    }
    #menu-btn-check {
        display: none;
    }

    /*content design*/
    .menu-content ul {
       padding: 70px 30px 0;
    }
    .menu-content ul li {
        border-bottom: solid 1px darkgray;
        list-style: none;
    }
    .menu-content ul li a {
        display: block;
        width: 90%;
        font-size: 15px;
        box-sizing: border-box;
        color:#000000;
        text-decoration: none;
        padding: 15px 20px 15px 0;
        position: relative;
    }
    .menu-content {
        width: 30%;
        height: 100%;
        position: fixed;
        top: 0;
        right: 100%;/*change the right value and menu is placed on out of the display*/
        z-index: 80;
        background-color: #F9DCD4;
        transition: all 0.5s;
    }
    #menu-btn-check:checked ~ .menu-content {
        right: 70%;/*the menu is put on the display (100% - width of menu-content)*/
    }

    .logout {
        width: 80px;
        height: 40px;
        border-color: #F9DCD4;
        background-color: #F9DCD4;
    }
</style>
<body>
    <header>
        <div class="hamburger-menu">
            <input type="checkbox" id="menu-btn-check">
            <label for="menu-btn-check" class="menu-btn"><span></span></label>

            <div class="menu-content">
                <ul>
                    <li>
                        <a href="history.php">HISTORY</a>
                    </li>
                    <li>
                        <a href="POSITIVE.php">YOUR COVID STATUS</a>
                    </li>
                    <li>
                        <a href="remind.php">ABOUT COVID</a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="d-flex flex-row-reverse bd-highlight mt-3 me-4">
            <form action="insert.php" method="POST">
                <button class="logout fs-5" type="submit" name="logout">Logout</button>
            </form>
        </div>
    </header>
</body>
</html>