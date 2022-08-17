<?php
$host = "localhost";
$dbname = "simplelearning";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);




$childName = $_POST["childName"];
$childLastName = $_POST["ChildLastname"];
$childAge = filter_input(INPUT_POST, "childAge", FILTER_VALIDATE_INT);
  
$gName = $_POST["fname"];
$gLastname = $_POST["lname"];
$gAge = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
$gMail = $_POST["mail"];
$gNumber = $_POST["num"];

if(empty( $_POST["mclass"])) 
  {
    $mclass = NULL;
  } else{
    $mclass = $_POST["mclass"];
    $mclass = implode(',', $mclass);
  }
  
if(empty( $_POST["eclass"])) 
  {
    $eclass = NULL;
  } else{
    $eclass = $_POST["eclass"];
    $eclass = implode(',', $eclass);
  }

if(empty( $_POST["sclass"])) 
  {
    $sclass = NULL;
  } else{
    $sclass = $_POST["sclass"];
    $sclass = implode(',', $sclass);
  }
  
  if(empty( $_POST["hclass"])) 
  {
    $hclass = NULL;
  } else{
    $hclass = $_POST["hclass"];
    $hclass = implode(',', $hclass);
  }

  if (empty($childName or $childLastName or $childAge or $gName or $gLastname or $gAge or $gMail or $gNumber)){
    die ("Everything must be filled out!");
  }
  // Check connection
if (mysqli_connect_errno()) {
  die("Connection Error: ". mysqli_connect_error());
}
$sql = "INSERT INTO studentinformation(StudentFirstName,StudentLastname,Studentage,mathClasses,englishClasses,scienceClasses,historyClasses,GuardianFirstname,GuardianLastname,GuardianAge,GuardianEmail,GuardianNum)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
  die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "ssissssssiss",
                  $childName,
                  $childLastName,
                  $childAge,
                  $mclass,
                  $eclass,
                  $sclass,
                  $hclass,
                  $gName,
                  $gLastname,
                  $gAge,
                  $gMail,
                  $gNumber
);

mysqli_stmt_execute($stmt);
echo "Data recorded!";
//var_dump($childName, $childLastName, $childAge, $mclass, $eclass, $sclass, $hclass, $gName, $gLastname, $gAge, $gMail, $gNumber);

?>