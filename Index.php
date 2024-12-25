<h1> File index.php </h1>
<?php
print("hello world<br>");
print_r("Test");
$myvar = 100;
echo "<h1>".$myvar."<h/1>";
echo "<br>";
$x = 1;
function x(){
    global $x;
    $x = 2;
}
echo $x;
echo "<br>";
x();
echo $x;
echo "<br>";
echo "1.5" + "55";
echo "<br>";
$x = "A";
$x++;
echo $x;
echo "<br><br>";

/** File index.php */

$my_array = array(0,1,array (2),3,4,5,"Myindex" => (3+3),"index" => 7);
print_r($my_array);
echo "<br>";
$my_array2[] = 1;
$my_array2[] = 2;
$my_array2[] = 3;
print_r($my_array2);
echo "<br>";
if(TRUE){
    echo "01\n";
}
if(TRUE or FALSE){
    echo "02\n";
}
if(TRUE || FALSE){
    echo "03\n";
}
echo "<br><br>";

$Testloop = array(1,2,3,4,5);
for($i = 0; $i < sizeof($Testloop); $i++){
    echo $Testloop[$i];
    echo "<br>";
}
?>
<h1><?php echo $myvar; ?></h1>
