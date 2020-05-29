<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = "";
$db = 'canteen';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $enroll = $_SESSION['enroll'];
    //$email = $_SESSION['email'];
    //$active = $_SESSION['active'];
}
if(isset($_POST['test0']))
{
$maggi=$_POST['test0'];
$samosa=$_POST['test1'];
$chai=$_POST['test2'];
$burger=$_POST['test3'];
$patty=$_POST['test4'];
$pizza=$_POST['test5'];
$result_insert = $mysqli->query("INSERT INTO orders(enroll,maggi,samosa,chai,burger,patty,pizza) VALUES('$enroll','$maggi','$samosa','$chai','$burger','$patty','$pizza')");
}
// $time=$mysqli->query("select * from orders where enroll='$enroll'");
// $tim=mysqli_fetch_assoc($time);
// $ftime=$tim['time'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="root" >
    <link rel="shortcut icon" href="img/logo.ico">

    <title>Why Wait</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- This is for card view -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <style>

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #EEE9E9;
    overflow-x: hidden;
    transition: 0.5s;
    /*padding-top: 60px;*/
}

.sidenav p {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
    position:absolute;
    top:50%;
}

.sidenav p:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<script>
 function alr(){
 alert("Thank you for ordering!! Your order will arrive shortly");
};

function del(){
var k=document.getElementById("order");
k.innerHTML="";
};
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
};

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
};
var items=["Maggi","samosa","chai","burger","patty","pizza"];
/*function colori(){
var k=document.getElementById("logout");
k.style.background-color="red";
};*/
var total=0;
var eachquant=[0,0,0,0,0,0];
/*function shout(){
var k="<?php echo $ftime; ?>";
if(k!=NULL)
alert("Your order will ready in"+k+"minutes");
};*/
function openit(){
var k=document.getElementById("sidew");
k.style.display="block";
};
function quantityplus(index){
price=[25,8,10,25,25,50];
eachquant[index]++;
var k=document.getElementById("quant");
var c=document.getElementById("total");
var a=document.getElementById("front"+String(index));
var s=k.innerHTML;
var m=c.innerHTML;
var h=Number(m);
var t=Number(s);
t=t+1;
h=h+price[index];
total=h;
k.innerHTML=String(t);
c.innerHTML=String(h);
a.innerHTML="("+String(eachquant[index])+")";
};
function quantityminus(index){
price=[10,20,30,40,50,60];
var k=document.getElementById("quant");
var c=document.getElementById("total");
var a=document.getElementById("front"+String(index));
var s=k.innerHTML;
var m=c.innerHTML;
var t=Number(s);
var h=Number(m);
if(t!=0 && eachquant[index]!=0)
{t=t-1;}
if(eachquant[index]!=0)
{h=h-price[index];}
if(eachquant[index]!=0)
{eachquant[index]--;}
total=h;
k.innerHTML=String(t);
c.innerHTML=String(h);
a.innerHTML="("+String(eachquant[index])+")";
};
function order(){
items=["Maggi","samosa","chai","burger","patty","pizza"];
var k=document.getElementById("order");
var flag=0;
for(i=0;i<price.length;i++){
if(eachquant[i]==0)
{flag++;
continue;}
k.innerHTML=k.innerHTML+String(eachquant[i])+" "+items[i]+"<br/>";
}
k.innerHTML=k.innerHTML+"Your total is Rs. "+String(total);
if(flag==price.length){
k.innerHTML=" You haven't order anything!!";
}
};
function checkout(){
/*var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
           
            }
        };
        xmlhttp.open("POST", "order.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send('arr='+eachquant);*/
//window.localStorage.setItem("arr", JSON.stringify(eachquant));
document.getElementById("test0").value = eachquant[0];
document.getElementById("test1").value = eachquant[1];
document.getElementById("test2").value = eachquant[2];
document.getElementById("test3").value = eachquant[3];
document.getElementById("test4").value = eachquant[4];
document.getElementById("test5").value = eachquant[5];
};
</script>

</head>

<body  >
    <!-- navbar centred text vertically with  line-height-->
    <nav class="navbar navbar-nav navbar-default navbar-fixed-top" style="line-height:50px;height:60px;">
        <div class="container" style="margin:0 !important;">
            <span class="navbar-left" style="font-size:1.2em;"><img src="img/logo.gif" class="logo_bitch"/> WHYWAIT</span>
            <h3 style="position:absolute;top:20%;right:40%;word-spacing:5px;">ORDER HERE</h3>
             <div style="background-color:red;" id="logout" onmouseover="colori()"> <a style="position:absolute;right:0px;height:100%;width:10%;top:0px;"  href="../index.php">LOGOUT</a></div>
            <!-- Search bar -->
           <!-- <div class="input-group" style="height: 100%;">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle navbar-btn usersearchbtn1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span id="search_concept">Any</span></button>
                    <ul class="dropdown-menu scrollable-dropdown" aria-labelledby="usersearchbtn1" style="margin-top: -36px;">
                        <li><a href="#">Any</li>
                        <li><a href="#">Restaurant</li>
                        <li><a href="#">Food</li>
                        <li><a href="#">Cuisine</li>
                        <li><a href="#">City</li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param" />
                <input type="text" class="form-control" name="x" id="usersearch" placeholder="Search" />
                <span class="input-group-btn">
                    <button class="btn btn-outline-secondary navbar-btn usersearchbtn" type="button">
                        <span class="glyphicon glyphicon-search" ></span>
                    </button>
                </span>
            </div>-->

        </div>
    </nav>
    <div id="mySidenav" class="sidenav">
  <!-- <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a> -->
  <p style="top:20%;"> Your order is  </p>
<p id="order"></p><br/>
<form method="post" action="userhome.php">
<input type="hidden" id="test0" name="test0" value="">
 <input type="hidden" id="test1" name="test1" value="">
 <input type="hidden" id="test2" name="test2" value="">
 <input type="hidden" id="test3" name="test3" value="">
 <input type="hidden" id="test4" name="test4" value="">
 <input type="hidden" id="test5" name="test5" value="">
 <input onclick="alr()" style="width:150px;position:absolute;bottom:50px;height:50px;right:100px;border-radius:12px;background-color:#00fa9a" type="submit" value="ORDER">
 </form>
 <button onclick="closeNav();del();" style="position:absolute;top:10%;right:0%;">CLOSE</button>
</div>


    <!-- <div id="wrapper"> -->

        <!-- Sidebar -->
        <!-- <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <?php echo "HELLO ";echo $_SESSION['username'];?>
                    </a>
                </li>
            
                <li>
                    <a href='#'>Order History</a>
                </li>
                <li>
                    <a href="#" onclick="openit(),order(),checkout()">Order Cart</a>
                </li>
            </ul>
        </div> -->

        <!-- /#sidebar-wrapper -->

<!--
        <a href="#menu-toggle" class="btn btn-default fa-bars" id="menu-toggle">
             <span class="glyphicon glyphicon-menu-hamburger"></span>
        </a>-->
        <!-- Page Content -->
        <div id="page-content-wrapper" style="padding:0; margin:0;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" style="padding:0; margin:0;">
                        <div class="slideshow">
                            <div onclick="closeNav();" " id="myCarousel" class="carousel slide cover_carousel" data-ride="carousel">
                                <!-- Carousel indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                <!-- Wrapper for carousel items -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="img/c1.png" alt="First Slide">
                                    </div>
                                    <div class="item">
                                        <img src="img/c2.jpg" alt="Second Slide">
                                    </div>
                                    <div class="item">
                                        <img src="img/c3.jpeg" alt="Third Slide">
                                    </div>
                                </div>
                                <!-- Carousel controls -->
                                <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top:30px;">

                </div>

                <h1 style="padding-left: 20px;">Serving Restaurants</h1>
                <hr class="liner"/>
                <div id="terabaaphumain">
                    <div class="rest_details lefty" style="float:left;">
                        <div class="row">
                            <!-- Sample template for hotel -->
                            <div class="col-sm-4">
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="img/maggi.jpg" alt="Card image cap"><br/>  
                                    <div class="card-block">
                                        <button style="width:30px;" onclick="quantityplus(0)">+</button>
                                        <p  style="position:absolute;right:40%;bottom:7%;">MAGGI</p>
                                        <p style="position:absolute;right:40%;bottom:1px;">Rs.25</p>
                                        <p  style="position:absolute;right:30%;bottom:7%;" id="front0">(0)</p>
                                        <button style="position:absolute; right:10px;width:30px;" onclick="quantityminus(0)">-</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="img/samosa.jpg" alt="Card image cap">
                                    <div class="card-block">
                                        <button onclick="quantityplus(1)">+</button>
                                        <p  style="position:absolute;right:40%;bottom:7%;">SAMOSA</p>
                                        <p style="position:absolute;right:40%;bottom:1px;">Rs.8</p>
                                        <p  style="position:absolute;right:30%;bottom:7%;" id="front1">(0)</p>
                                        <button style="position:absolute; right:10px;width:30px;" onclick="quantityminus(1)">-</button>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="img/chai.jpg" alt="Card image cap">
                                    <div class="card-block">
                                        <button onclick="quantityplus(2)">+</button>
                                        <p  style="position:absolute;right:40%;bottom:7%;">CHAI</p>
                                        <p style="position:absolute;right:40%;bottom:1px;">Rs.10</p>
                                        <p  style="position:absolute;right:30%;bottom:7%;" id="front2">(0)</p>
                                        <button style="position:absolute; right:10px;width:30px;" onclick="quantityminus(2)">-</button>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="img/burger.jpg" alt="Card image cap">
                                    <div class="card-block">
                                        <button onclick="quantityplus(3)">+</button>
                                        <p  style="position:absolute;right:40%;bottom:7%;">BURGER</p>
                                        <p style="position:absolute;right:40%;bottom:1px;">Rs.25</p>
                                        <p  style="position:absolute;right:30%;bottom:7%;" id="front3">(0)</p>
                                        <button style="position:absolute; right:10px;width:30px;" onclick="quantitminus(3)">-</button>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="img/patty.jpg" alt="Card image cap">
                                    <div class="card-block">
                                        <button onclick="quantityplus(4)">+</button>
                                        <p  style="position:absolute;right:40%;bottom:7%;">PATTY</p>
                                        <p style="position:absolute;right:40%;bottom:1px;">Rs.25</p>
                                        <p  style="position:absolute;right:30%;bottom:7%;" id="front4">(0)</p>
                                        <button style="position:absolute; right:10px;width:30px;" onclick="quantityminus(4)">-</button>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                        <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="img/pizza.png" alt="Card image cap">
                                    <div class="card-block">
                                        <button onclick="quantityplus(5)">+</button>
                                        <p  style="position:absolute;right:40%;bottom:7%;">PIZZA</p>
                                        <p style="position:absolute;right:40%;bottom:1px;">Rs.50</p>
                                        <p  style="position:absolute;right:30%;bottom:7%;" id="front5">(0)</p>
                                        <button style="position:absolute; right:10px;width:30px;" onclick="quantityminus(5)">-</button>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div> <!-- Rest details end-->


                    <!-- recommended section-->
                    <div  style="position:absolute;right:70px;">

                        
                        <!-- <a href="#" onclick="openNav();order();checkout();"> Bucket</a> -->
                        <!-- <p id="quant" style="position:absolute;top:40%;" > 0</p> -->
                        <i id="quant" onclick="openNav();order();checkout();" class="fa fa-shopping-cart" style="font-size:48px;cursor:pointer;">0</i><br/><br/>
                        
                        <p>TOTAL:Rs. <span id="total">0</span></p>  
                    </div>



                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // Search bar code
    $(document).ready(function(e){
     $('.search-panel .dropdown-menu').find('a').click(function(e) {
           e.preventDefault();
           var param = $(this).attr("href").replace("#","");
           var concept = $(this).text();
           $('.search-panel span#search_concept').text(concept);
           $('.input-group #search_param').val(param);
       });
     });
    </script>

</body>

</html>
