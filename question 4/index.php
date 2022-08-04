<?php 


$conn = mysqli_connect("localhost","root","","csv");

if(isset($_POST['import'])){

    $fileName = $_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"]>0){
        $file = fopen($fileName,"r");

        while(($column = fgetcsv($file,50000,",")) !== FALSE){
            $sqlInsert = "Insert into data (name,type) values('" . $column[0]. "', '" .$column[1]."')";
            $result = mysqli_query($conn,$sqlInsert);
            if(!empty($result)){
                echo "CSV Data importend into the database";

            }else{
                echo "Not Imported";
            }
        }
    }
}


?>
<table >
<form class="form-horizoontal" action="" method="post" name="uploadCsv" enctype="multipart/form-data">
<div>
    <label>Upload CSV File</label>

    <input type="file" name="file" accept=".csv">
    <button type="submit" name="import">Import</button>
</div>

</form>

</table>

<?php 
$sqlSelect = "SELECT * from data";

$result = mysqli_query($conn,$sqlSelect);
if(mysqli_num_rows($result) > 0){
    ?>

    <table>
        <thead>
            <th>Id</th>
            <th>mo</th>
            <th>style_code</th>
            <th>style_description</th>
            <th>color</th>
            <th>size</th>
            <th>total_order_qty</th>
        </thead>
        <?php

while($row = mysqli_fetch_array($result))
{


?>
<tbody>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['mo']; ?></td>
        <td><?php echo $row['style_code']; ?></td>
        <td><?php echo $row['style_description']; ?></td>
        <td><?php echo $row['color']; ?></td>
        <td><?php echo $row['size']; ?></td>
        <td><?php echo $row['total_order_qty']; ?></td>

    </tr>
</tbody>
<?php } ?>
    </table>
<?php }

?>
