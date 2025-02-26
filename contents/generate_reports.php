<?php 
require '../fpdf186/fpdf.php';
require_once __DIR__ . '/../classes/connect.php'; 

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Title
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(71,10,'',0,0);
$pdf->Cell(59,5,'Completed Orders',0,0);
$pdf->Cell(59,10,'',0,1);
$pdf->Ln(10);

// Company Info
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(71, 5, 'Urban Link Transport',0,0);
$pdf->Cell(59,5,'',0,0);
$pdf->Cell(59, 5,'Details',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(130, 5,'Near Kericho',0,0);
$pdf->Cell(25, 5,'  Contact Info:',0,0);
$pdf->Cell(34, 5,'0712345678',0,1);


// Connect to Database
$conn = new connection();

// Fetch Completed Orders
$query = "SELECT * FROM orders WHERE  status = 'Completed' ORDER BY orderedAt DESC";
$stmt = $conn->connect()->prepare($query);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Order Details
$orderDate = date('d M Y');
$pdf->Cell(130,5,'City, 751001',0,0);
$pdf->Cell(25,5,'Date:',0,0);
$pdf->Cell(34,5, $orderDate,0,1);
$pdf->Ln(10);

// Table Headers
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10, 6, 'SI',1,0,'C');
$pdf->Cell(50, 6, 'Product Details',1,0,'C');
$pdf->Cell(23, 6, 'Weight (kg)',1,0,'C');
$pdf->Cell(30, 6, 'Distance (km)',1,0,'C');
$pdf->Cell(30, 6, 'Vehicle',1,0,'C');
$pdf->Cell(25, 6, 'Total Cost',1,1,'C');

$pdf->SetFont('Arial','',10);

// Populate Table
$si = 1;
$grandTotal = 0;
foreach ($orders as $order) {
    $pdf->Cell(10, 6, $si++,1,0,'C');
    $pdf->Cell(50, 6, $order['productdetails'],1,0,'L');
    $pdf->Cell(23, 6, $order['weight'],1,0,'R');
    $pdf->Cell(30, 6, $order['distance_km'],1,0,'R');
    $pdf->Cell(30, 6, $order['assigned_vehicle'],1,0,'R');
    $pdf->Cell(25, 6, number_format($order['total_cost'], 2),1,1,'R');
    
    $grandTotal += $order['total_cost'];
}

// Display Grand Total
$pdf->SetFont('Arial','B',10);
$pdf->Cell(143, 6, 'Grand Total',1,0,'R');
$pdf->Cell(25, 6, number_format($grandTotal, 2),1,1,'R');

$pdf->Output();
?>
