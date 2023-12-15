<?php 

include('../database_conn.php');

$sql = "SELECT * FROM _appointments";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../backend_css_file/admin_panel.css?v=<?php echo time(); ?>">

<body>
<div class="main-bar">
        <div class="side-bar">
            <img src="All _Photos/logo's_crop.jpg" alt="">
            <a href="/dental_clinic/dashboard/dashboard.php">Dashboard</a>
            <a href="/dental_clinic/users/users.php">Users</a>
            <a href="/dental_clinic/calender/calender.php">Calender</a>
            <a href="/dental_clinic/appointed/appointment.php">Appointment</a>
            <a href="/dental_clinic/feedback/feedback.php">Feedback</a>
        </div>
        <div class="content-bar">
            <div class="users">
    <table border="0"  >

        <thead>
        <tr>
            <th>ID</th>
            <th>First&nbsp;Name</th>
            <th>Last&nbsp;Name</th>
            <th>Age</th>
            <th>Date&nbsp;of&nbsp;Birth</th>
            <th>Gender</th>
            <th>Relationship</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        <?php 
            if($result->num_rows >0){
             $index =0;
                while($row = $result->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $index+1; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['date_of_birth']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['relationship']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['remarks']; ?></td>
                        <td>
                        <a  href="edit_service_form.php?id=<?php echo $row['id'] ?>">Edit</a>&nbsp;
                        <a  href="delete_services_form.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                    </tr>
            <?php   }
            }
            ?>
        </tbody>

    </table>
    </div>

        </div>
        <a href="logout.php">
            <button>LOG OUT</button>
        </a>
        

    </div>
</body>
</html>