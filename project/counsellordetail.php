<?php
// Include the database connection
include 'dbconnect.php'; // Change the path accordingly

$counselors = mysqli_query($conn, "SELECT * FROM `counsellor`");
$counselorList = [];

if ($counselors) {
    while ($row = mysqli_fetch_assoc($counselors)) {
        $counselorList[] = $row;
    }
} else {
    echo "Error fetching counselor data: " . mysqli_error($conn);
}

mysqli_close($conn); // Close the database connection
?>

<!DOCTYPE html>
<html>

<head>
    <title>Counselor List</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>

<body>
    <h1>All Counselors</h1>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Specialization</th>
                    <th>Years of Experience</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($counselorList as $counselor) : ?>
                    <tr>
                        <td><?php echo $counselor['id']; ?></td>
                        <td><?php echo $counselor['name']; ?></td>
                        <td><?php echo $counselor['email']; ?></td>
                        <td><?php echo $counselor['gender']; ?></td>
                        <td><?php echo $counselor['specialization']; ?></td>
                        <td><?php echo $counselor['yearofexp']; ?></td>
                        <td><?php echo $counselor['description']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div style="position: fixed; bottom: 20px; left: 20px;">
            <a href="counselloradd.php" class="btn btn-outline-secondary">Add Counselor</a>
        </div>

    </div>
</body>

</html>
