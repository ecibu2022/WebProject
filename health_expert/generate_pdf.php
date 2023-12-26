<?php
// Include the TCPDF library
require_once('../admin/tcpdf.php');

// Function to generate the PDF
function generatePDF() {
    // Create a new PDF document (as shown in the previous example)

// Create a new PDF document
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Health E');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Subscribed Users Report');
$pdf->SetSubject('Subscribed Users Report');

// Add a page to the PDF
$pdf->AddPage();

// Set font
$pdf->SetFont('times', 'B', 20);

// Add a heading
$pdf->Cell(0, 18, 'Subscribed Users Report', 0, 1, 'C');

// Add a table with headers
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(25, 10, 'ID', 1);
$pdf->Cell(50, 10, 'FullName', 1);
$pdf->Cell(50, 10, 'Email', 1);
$pdf->Cell(25, 10, 'License', 1);
$pdf->Cell(40, 10, 'Specialization', 1);
$pdf->Ln();

// Include database connection
include "../connection.php";

// Retrieve users from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Check if there are any users
if (mysqli_num_rows($result) > 0) {
    // Fetch and add users to the PDF table
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->SetFont('times', 'N', 12);
        $pdf->Cell(25, 10, $row['id'], 1);
        $pdf->Cell(50, 10, $row['name'], 1);
        $pdf->Cell(50, 10, $row['email'], 1);
        $pdf->Cell(25, 10, $row['license'], 1);
        $pdf->Cell(40, 10, $row['specialization'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(190, 10, 'No subscribed users found', 1, 1, 'C');
}

// Close the database connection
mysqli_close($conn);

    // Output the PDF as a file
    $pdf->Output('Subscribed_users_report.pdf', 'D');
}

// Check if the button is clicked
if (isset($_GET['generate_pdf'])) {
    // Generate the PDF
    generatePDF();
}
?>
