

<?php
$nameErr = $pricerror = $imageerror = "";
$name = $price = $image = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty($_POST["name"])){
        $nameErr = "Please enter a valid name";

    }
    else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
}

?>
<h3>Form validation</h3>
<p><span class ="error">* required field</p>

<form method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name= "name">
<span class = "error">  *<?php echo $priceErr;?></span>
<br>
Price: <input type="price" name= "price">
<span class = "error">*<?php echo $nameErr;?></span>
<br>
Image:<input type="file" name="image">
<span class = "error">*<?php echo $imageErr;?></span>
<br>  <br>
<input type="submit" name = "click here" value = "click here">

</form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $price;
echo "<br>";
echo $image;
echo "<br>";
?>

