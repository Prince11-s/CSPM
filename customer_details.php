<?php
// Include your database connection
include 'dbconn.php';

// Check if the request contains a customer name
if(isset($_POST['cust_name'])) {
    // Get the customer name from the request
    $cust_name = $_POST['cust_name'];
    
    // Perform a database query to fetch the customer ID based on the name
    $query = "SELECT id FROM add_customer WHERE first_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $cust_name);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // If a row is found, fetch the ID and return it
    if($row = $result->fetch_assoc()) {
        // Prepare JSON response
        $response = array(
            'success' => true,
            'customer_id' => $row['id']
        );
        echo json_encode($response);
    } else {
        // Prepare JSON response for no customer found
        $response = array(
            'success' => false,
            'message' => 'Customer ID not found'
        );
        echo json_encode($response);
    }
} else {
    // Prepare JSON response for no customer name provided
    $response = array(
        'success' => false,
        'message' => 'No customer name provided'
    );
    echo json_encode($response);
}

// Close the database connection
$stmt->close();
$conn->close();
?>
