<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = "";
$db = 'canteen';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
/*if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $enroll = $_SESSION['enroll'];
    //$email = $_SESSION['email'];
    //$active = $_SESSION['active'];
}
if(isset($_POST['test']))
{
$arr=$_POST['test'];
$values=serialize($arr);
$result_insert = $mysqli->query("INSERT INTO orders(orders,enroll) VALUES('$values','$enroll')" );*/

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/logo.ico">

    <title>Why Wait</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- This is for card view -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
<script>
var items=["Maggi","samosa","chai","burger","patty","pizza"];
var total=0;
var eachquant=[0,0,0,0,0,0];
function openit(){
var k=document.getElementById("sidew");
k.style.display="block";
alert("cool");
};
function quantityplus(index){
price=[10,20,30,40,50,60];
eachquant[index]++;
var k=document.getElementById("quant");
var c=document.getElementById("total");
var s=k.innerHTML;
var m=c.innerHTML;
var h=Number(m);
var t=Number(s);
t=t+1;
h=h+price[index];
total=h;
k.innerHTML=String(t);
c.innerHTML=String(h);
};
function quantityminus(index){
price=[10,20,30,40,50,60];
var k=document.getElementById("quant");
var c=document.getElementById("total");
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
k.innerHTML=k.innerHTML+"Your total is "+String(total);
if(flag==price.length){
k.innerHTML=" You haven't order anything!!";
}
};
var s="";
function checkout(){
/*for(i=0;i<eachquant.length;i++)
{
s=s+String(eachquant[i])+" "+items[i];
}*/
//var xmlhttp = new XMLHttpRequest();
        //xmlhttp.onreadystatechange = function() {
        //    if (this.readyState == 4 && this.status == 200) {
           
          //  }
        //};
  //      xmlhttp.open("POST", "new.php",true);
  //      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  //      xmlhttp.send('test='+s);
//window.localStorage.setItem("arr", JSON.stringify(eachquant));
alert("cool");
var l=document.getElementByID("test");
l.value="cool";
};
</script>

</head>

<body>
    <!-- navbar centred text vertically with  line-height-->
    <nav class="navbar navbar-nav navbar-default navbar-fixed-top" style="line-height:50px;height:60px;">
        <div class="container" style="margin:0 !important;">
            <span class="navbar-left" style="font-size:1.2em;"><img src="img/logo.gif" class="logo_bitch"/>   FOODSPARK</span>

            <!-- Search bar -->
            <div class="input-group" style="height: 100%;">
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
            </div>

        </div>
    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Hello, {{customer.name}}
                    </a>
                </li>
                <li>
                    <a href="/details/">Details</a>
                </li>
                <li>
                    <a href="/history/">Order History</a>
                </li>
                <li>
                    <a href="/cart/">Order Cart</a>
                </li>
                <li>
                    <a href="/logout/">Log out</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <div style="margin-top:60px;">

        </div>
<div id="sidew" style="height:100%; width:300px;position:fixed;right:0px;background-color:white;z-index:1;display:none;">
<p> Your order is  </p>
<p id="order"></p><br/>
<form method="post" action="new.php">
<input type="hidden" id="test" name="test" visibility="hidden" value=""/>
 <input type="submit" value="ORDER" />
</form>
</div>
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
                            <div id="myCarousel" class="carousel slide cover_carousel" data-ride="carousel">
                                <!-- Carousel indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                <!-- Wrapper for carousel items -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="img/bg5.jpg" alt="First Slide">
                                    </div>
                                    <div class="item">
                                        <img src="img/bg2.jpg" alt="Second Slide">
                                    </div>
                                    <div class="item">
                                        <img src="img/bg4.jpg" alt="Third Slide">
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
                                    <img class="card-img-top" src="img/bg1.jpg" alt="Card image cap">
                                    <div class="card-block">
                                        <button onclick="quantityplus(0)">+</button>
                                        <button style="position:absolute; right:10px;" onclick="quantityminus(0)">-</button>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="img/bg1.jpg" alt="Card image cap">
                                    <div class="card-block">
                                        <button onclick="quantityplus(1)">+</button>
                                        <button style="position:absolute; right:10px;" onclick="quantityminus(1)">-</button>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="img/bg1.jpg" alt="Card image cap">
                                    <div class="card-block">
                                        <button onclick="quantityplus(2)">+</button>
                                        <button style="position:absolute; right:10px;" onclick="quantityminus(2)">-</button>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="img/bg1.jpg" alt="Card image cap">
                                    <div class="card-block">
                                        <button onclick="quantityplus(3)">+</button>
                                        <button style="position:absolute; right:10px;" onclick="quantitminus(3)">-</button>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="img/bg1.jpg" alt="Card image cap">
                                    <div class="card-block">
                                        <button onclick="quantityplus(4)">+</button>
                                        <button style="position:absolute; right:10px;" onclick="quantityminus(4)">-</button>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                        <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="img/bg1.jpg" alt="Card image cap">
                                    <div class="card-block">
                                        <button onclick="quantityplus(5)">+</button>
                                        <button style="position:absolute; right:10px;" onclick="quantityminus(5)">-</button>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div> <!-- Rest details end-->


                    <!-- recommended section-->
                    <div  style="position:absolute;right:70px;">

                        <a href="#" onclick="openit(),order()"> Bucket</a>
                        <p id="quant"> 0</p><br/>
                        <p>total:<span id="total">0</span></p>
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
