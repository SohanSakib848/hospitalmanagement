<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    
    $conn = new mysqli('localhost', 'root', '', 'patient');

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get values from the form
    $DoctorID = $_POST['DoctorID'];
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Speciality = $_POST['Speciality'];

   
    $checkDuplicateQuery = "SELECT * FROM doctors WHERE DoctorID = '$DoctorID'";
    $duplicateResult = $conn->query($checkDuplicateQuery);

    if ($duplicateResult->num_rows > 0) {
      
        echo '<p class="error-message">Duplicate entry for DoctorID ' . $DoctorID . '. Record not inserted.</p>';
    } else {
        
        $insertQuery = "INSERT INTO doctors (DoctorID, Name, Age, Gender, Speciality)
                        VALUES ('$DoctorID', '$Name', '$Age', '$Gender', '$Speciality')";

        if ($conn->query($insertQuery) === TRUE) {
            echo '<p class="success-message">Doctor record inserted successfully</p>';
        } else {
            echo '<p class="error-message">Error: ' . $conn->error . '</p>';
        }
    }

    $conn->close();
}
?>
