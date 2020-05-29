<?php
$host = 'localhost';
$user = 'root';
$pass = "";
$db = 'canteen';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$user = $mysqli->query("SELECT * FROM orders");
//$query = $user->fetch_assoc();
echo "<meta http-equiv='refresh' content='30' />";
echo "<table border='1' style='position:absolute;top:30%;right:50%;'>";
echo "<tr>";
echo "<td>Enrollment no.</td>";
echo "<td>Maggi</td>";
echo "<td>Samosa</td>";
echo "<td>Chai</td>";
echo "<td>Burger</td>";
echo "<td>Patty</td>";
echo "<td>Pizza</td>";
echo "</tr>";
while($r=mysqli_fetch_row($user))
    {
echo "<tr>";
echo "<td>$r[1]</td>";
echo "<td>$r[2]</td>";
echo "<td>$r[3]</td>";
echo "<td>$r[4]</td>";
echo "<td>$r[5]</td>";
echo "<td>$r[6]</td>";
echo "<td>$r[7]</td>";
echo "<td>";
echo "<form method='post' action='order.php'>";
echo "<input type='hidden' name='enr' value='$r[1]'/>";
echo "<input type='submit' value='SEEN'/>" ;
echo "</form>";
echo "</td>";
echo "</tr>";
}
echo "</table>";
if(isset($_POST['enr']))
{   
   $enr=$_POST['enr'];
   $result=$mysqli->query("DELETE FROM orders WHERE enroll='$enr'");
}
?>
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "10";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
</html>
<!--<!DOCTYPE html>
<html>
<title>CANTEEN</title>
<head><script>
var items=["Maggi","samosa","chai","burger","patty","pizza"];
var array=[];
array[0]="<?php //echo $maggi; ?>";
array[1]="<?php //echo $samosa; ?>";
array[2]="<?php //echo $chai; ?>";
array[3]="<?php //echo $burger; ?>";
array[4]="<?php //echo $patty; ?>";
array[5]="<?php //echo $pizza; ?>";

function myfunc(){
var enroll="<?php //echo $enroll; ?>";
var id="<?php //echo $id; ?>";
var k=document.getElementById("canteen");
k.innerHTML=String(id)+") ";
k.innerHTML=k.innerHTML+enroll+"- ";
for(i=0;i<array.length;i++){
if(array[i]==0)
{continue;}
k.innerHTML=k.innerHTML+String(array[i])+" "+items[i]+", ";
}	
};
</script></head>
<body onload="myfunc()">
<p>Order is:</p></br>
<p id="canteen"></p>
</body>
</html>-->

  


