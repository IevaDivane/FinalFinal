<?php
require_once './config.php';

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($db, "select * from tasks where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if (isset($_POST['update'])) // when click on Update button
{
  $task = $_POST['task'];


  $edit = mysqli_query($db, "update tasks set task='$task' where id='$id'");

  if ($edit) {
    mysqli_close($db); // Close connection
    header("location:profile.php"); // redirects to all records page
    exit;
  } else {
    echo mysqli_error();
  }
}
?>

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="task" value="<?php echo $data['task'] ?>" placeholder="" Required>
  <input type="submit" name="update" value="Update">
</form>