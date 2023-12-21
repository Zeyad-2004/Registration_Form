<?php include('inc/header.php')?>

<?php
    $sql = " SELECT * from `registration_form` ";

    $result = mysqli_query($conn, $sql);

?>
<table class="table" style="width: 98%;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Fullname</th>
      <th scope="col">Email</th>
      <th scope="col">Phone number</th>
      <th scope="col">Hashed Password</th>
      <th scope="col">Gender</th>
    </tr>
  </thead>
  <tbody>
    <?php
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr>
                    <th scope='row'>$row[id]</th>
                    <td>$row[user_name]</td>
                    <td>$row[full_name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone_number]</td>
                    <td>$row[password]</td>
                    <td>$row[gender]</td>
                  </tr>";
        }
    ?>
  </tbody>
</table>

<button type="button" class="btn btn-light" style="position: absolute; left: 0; top: 0; margin: 20px;">
    <a href="index.php" style="text-decoration: none; color: #9b59b6 ; font-weight: 600">Register</a>
</button>