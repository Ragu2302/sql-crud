<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>s.admin</title>
</head>
<body>
<table class="table table-bordered table-striped align-middle">
      <thead>
        <tr>
          <th>S.No.</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email Address</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Role</th>
          <th>Joining Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        # Include connection
        require_once "./config.php";

        # Attempt select query execution
        $sql = "SELECT * FROM employees";

        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
              <tr>
                <td><?= $count++; ?></td>
                <td><?= $row["first_name"]; ?></td>
                <td><?= $row["last_name"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["age"]; ?></td>
                <td><?= $row["gender"]; ?></td>
                <td><?= $row["designation"]; ?></td>
                <td><?= $row["joining_date"]; ?></td>
              </tr>
            <?php
            }
            # Free result set
            mysqli_free_result($result);
          } else { ?>
            <tr>
              <td class="text-center text-danger fw-bold" colspan="9">** No records were found **</td>
            </tr>
        <?php
          }
        }
        # Close connection
        mysqli_close($link);
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>