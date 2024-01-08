<?php
$first_name_err = $last_name_err = $age_err =
  $date_of_birth_err = $gender_err = $relationship_err =
  $contact_err = $email_err = $address_err = $remarks_err = "";

$first_name = $last_name = $age = $date_of_birth =
  $gender = $relationship = $contact = $email = $address = $remarks = "";

include '../database_conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["first_name"])) {

    $first_name_err = "*First Name Required";
  } else {

    $first_name = input($_POST["first_name"]);
  }

  if (empty($_POST["last_name"])) {

    $last_name_err = "*Last Name Required";
  } else {

    $last_name = input($_POST["last_name"]);
  }
  if (empty($_POST["age"])) {

    $age_err = "*Age Required";
  } else {

    $age = input($_POST["age"]);
  }
  if (empty($_POST["date_of_birth"])) {

    $date_of_birth_err = "*Date_of_birth Required";
  } else {

    $date_of_birth = input($_POST["date_of_birth"]);
  }
  if (empty($_POST["gender"])) {

    $gender_err = "*Gender Required";
  } else {

    $gender = input($_POST["gender"]);
  }
  if (empty($_POST["relationship"])) {

    $relationship_err = "*Relationship Required";
  } else {

    $relationship = input($_POST["relationship"]);
  }
  if (empty($_POST["contact"])) {

    $contact_err = "*Contact Required";
  } else {

    $contact = input($_POST["contact"]);
  }
  if (empty($_POST["email"])) {

    $email_err = "*Email Required";
  } else {

    $email = input($_POST["email"]);
  }
  if (empty($_POST["address"])) {

    $address_err = "*Address Required";
  } else {

    $address = input($_POST["address"]);
  }
  if (empty($_POST["remarks"])) {

    $remarks_err = "*Remarks Required";
  } else {

    $remarks = input($_POST["remarks"]);
  }

  // To check contact exist or not
  $checkExists = "Select * From `_appointments`  WHERE contact = '$contact'";
  $result = mysqli_query($conn, $checkExists);
  $checkExistsRows = mysqli_num_rows($result);

  if ($checkExistsRows > 0) {

    echo "Details already exist";
  } else {

    if ($first_name_err == "" && $last_name_err == "" && $age_err == "" && $date_of_birth_err == "" && $gender_err == "" && $relationship_err == "" && $contact_err == "" && $email_err == "" && $address_err == "" && $remarks_err == "") {

      $sql = "INSERT INTO `_appointments` (`first_name`,`last_name`,`age`,`date_of_birth`,`gender`,`relationship`,`contact`,`email`,`address`,`remarks`) VALUES('$first_name','$last_name','$age','$date_of_birth','$gender','$relationship','$contact','$email','$address','$remarks')";

      $result = mysqli_query($conn, $sql);

      if ($result) {

        header("location:homee.php");
        echo"Appointment Done";
        
      }
    } else {

      echo "Please Fill the Field";
    }
  }
}

function input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Appointment Form</title>
  <link rel="stylesheet" href="./css/service_form.css?v=<?php echo time(); ?>">
  <!-- <script>
    function showAlert() {
      let message = "Form Registered Sucessfully!";

      alert(message);
    }
  </script> -->
</head>

<body>
  <!-- body starts form here -->
  <div class="patient_form">
    <form action="services_form.php" method="post">
      <div class="first-row">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" placeholder="Enter Your First Name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="error" style="color: red;">
          <?php echo $first_name_err ?>
        </span>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" placeholder="Enter Your Last Name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="error" style="color: red;">
          <?php echo $last_name_err ?>
        </span>

        <label for="age">Your Age:</label>
        <input type="number" id="age" name="age" placeholder="Enter Your Age">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="error" style="color: red;">
          <?php echo $age_err ?>
        </span>
      </div>
      <hr>
      <div class="second-row">
        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" placeholder="Enter Your Date of Birth">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <label for="gender">Gender:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <label for="male">Male</label>
        <input type="radio" id="gender" name="gender" value="M" >
        <label for="female">Female</label>
        <input type="radio" id="gender" name="gender" value="F" >

        <span class="error" style="color: red;">
          <?php echo $date_of_birth_err ?>
        </span>


        <label for="relationship">Relationship:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="relationship" id="relationship">
          <option>Relationship Status</option>
          <option value="Married">Married</option>
          <option value="Unmarried">Unmarried</option>
        </select>
        <br>
        <span class="error" style="color: red;">
          <?php echo $relationship_err ?>
        </span>
      </div>
      <hr>
      <div class="third-row">
        <label for="contact">Contact:</label>
        <input type="tel" id="contact" name="contact" placeholder="Enter Your Phone Number">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="error" style="color: red;">
          <?php echo $contact_err ?>
        </span>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="error" style="color: red;">
          <?php echo $email_err ?>
        </span>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" placeholder="Enter Your Address">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        <span class="error" style="color: red;">
          <?php echo $address_err ?>
        </span>
      </div>
      <hr>
      <div>
        <label for="remarks">Remarks</label><br>
        <textarea name="remarks" id="remarks" cols="30" rows="5" placeholder="Say Something About Your Appointment...">></textarea><br>
        <br>
        <span class="error" style="color: red;">
          <?php echo $remarks_err ?>
        </span>
      </div>
      <button type="submit" onclick="showAlert()">Submit Form</button>
      <hr>

    </form>
  </div>
</body>

</html>