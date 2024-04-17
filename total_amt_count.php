<?php
include 'dbconn.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT total FROM add_product WHERE descrip = 'Chamfering'";
$result = $conn->query($sql);

$totalChamfering = 0; 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $totalChamfering += $row["total"]; 
    }
} else {
    echo "No records found.";
}

$sql = "SELECT total FROM add_product WHERE descrip = 'Assembly'";
$result = $conn->query($sql);

$totalAssembly= 0; 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $totalAssembly += $row["total"]; 
    }
} else {
    echo "No records found.";
}

$sql = "SELECT total FROM add_product WHERE descrip = 'Painting'";
$result = $conn->query($sql);

$totalPainting = 0; 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $totalPainting += $row["total"]; 
    }
} else {
    echo "No records found.";
}

$sql = "SELECT total FROM add_product WHERE descrip = 'Punching'";
$result = $conn->query($sql);

$totalPunching = 0; 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $totalPunching += $row["total"]; 
    }
} else {
    echo "No records found.";
}

echo "Total for chamfering: " . $totalChamfering;
echo "Total for chamfering: " . $totalAssembly;
echo "Total for chamfering: " . $totalPainting;
echo "Total for chamfering: " . $totalPunching;


$conn->close();
?>