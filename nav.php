<?php 
session_start();
?>
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oleo+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
</head>
<style>
*{
    padding: 0;
    margin: 0;
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;
}
body{
    background-color:#8CAED8;
}
table {
    font-family: 'Open Sans', sans-serif;
    margin: auto;
    width: 25%;
    border: 3px solid #B2C9E6;
    padding: 10px;
    background-color:#D8E4F2;
}

table.join {
    width: 45%;
}

table tr td{
    color: black;
    text-align: center;
}
table tr td button.edit{
    width:100%;
    background-color:#1A4D39;
}
table tr td button.delete{
    width:100%;
    background-color:#8E2F31;
}
table tr td button.tafel{
    width:100%;
    background-color:#39AB71;
}
table tr td button a{
    color:white;
}
nav{
    font-family: 'Oleo Script', cursive;
    font-size: 30px;
    background: #4379BB;
    height: 45px;
    width: 100%;
    padding: 0;

}
nav ul{
    float: left;

}
nav ul li{
    display: inline-block;
    margin-right: 80px;
}

nav ul li a{
    color: #8CAED8;
}

button{
    background-color: white;
}
button a{
    color: black;
}

a:hover{
    color : #D8E4F2;
    transition: .5s;
}
form{
    font-family: 'Open Sans', sans-serif;
    margin: auto;
    width: 35%;
    border: 3px solid #B2C9E6;
    padding: 10px;
    background-color:#D8E4F2;
    min-width: 200px;
    float: static;
}
form input.input{
    width: 100%;
    text-align: center;
}
form input.button{
    width: 50%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 10px;
}
form img{
    max-height: 110px;
    max-width: 200px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    border: 3px solid;
}
</style>
<nav>
    <div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href='add_artikel.php'>Add</a></li>
            <li><a href='join.php'>join</a></li>
            <li><a href='tafel.php'>tafel</a></li>
            <?php 
            if(isset($_SESSION["id"])){
                echo "<li><a href='profile.php'>profile</a></li> ";
                echo "<li><a href='logout.php'>logout</a></li> ";
              }else{
                echo "<li><a href='signup.php'>Singup</a></li>";
                echo "<li><a href='loginform.php'>Login</a></li> ";
              }
            ?>
        </ul>
    </div>
</nav>
