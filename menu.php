


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dez Doura Homepage</title>
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital@1&display=swap" rel="stylesheet">
</head>
<body>
    <section id="banner">
        <img src="/assets/img/dezdoura.png" class="logo">
        <div class="banner-text">
            <h1>Your tourism app</h1>
            <p>Travel with only one click</p>
            <div class="banner-btn">
                <a href="#"><span></span> Find out</a>
                <a href="#"><span></span> Read more</a>
            </div>
        </div>
    </section>
    <div id="sideNav">
        <nav>
          <ul>
              <li><a href="menu.html">HOME</a></li>
              <li><a href="hotel.html">SEARCH</a></li>
              <li><a href="user.php">EDIT PROFILE</a></li>
              <li><a href="logout.php">LOGOUT</a></li>
              <li><a href="index.html">CONTACTS</a></li>
        </nav>
    </div>
    <div id="menubtn">
        <img src="assets/img/menu.png" id="menu">
    </div>
    <script>
        var menubtn = document.getElementById("menubtn")
        var sideNav = document.getElementById("sideNav")
        var menu = document.getElementById("menu") 
        menubtn.onclick = function(){
            if(sideNav.style.right =="-250px"){
                sideNav.style.right ="0";
            }
            else
                sideNav.style.right ="-250px";
        }
    </script>
</body>
</html>