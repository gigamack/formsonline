<form action="#" method="POST">
<input type="number" name="array[]" value="0">
<input type="number" name="array[]" value="0">
<input type="number" name="array[]" value="0"> <!--taking array input by input name array[]-->
<input type="number" name="array[]" value="0">
<input type="submit" name="submit">
</form>
<?php
$a=$_POST['array'];
// echo "Input :" .$a[3];  // Displaying Selected array Value
    print_r($a); //print all array element.

echo "Sum of it it ".array_sum($a);
?>