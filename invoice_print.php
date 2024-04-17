<?php 
  require ("fpdf/fpdf.php");
  include 'dbconn.php';

  $info=[
    "customer"=>"",
    "address"=>"",
    "city"=>"",
    "invoice_no"=>"",
    "invoice_date"=>"",
    "total"=>"",
  ];

  $sql= "SELECT * FROM invoice WHERE SID='{$_GET["id"]}'";
  $result = $conn->query($sql);
  if($result->num_rows>0){
    $row = $result->fetch_assoc();

  $info=[
    "customer"=>$row["CNAME"],
    "address"=>$row["CADDRESS"],
    "city"=>$row["CCITY"],
    "invoice_no"=>$row["INVOICE_NO"],
    "invoice_date"=>date("d-m-y",strtotime($row["INVOICE_DATE"])),
    "total"=>$row["GRAND_TOTAL"],
  ];

  }
  $sql= "SELECT * FROM invoice_products WHERE SID='{$_GET["id"]}'";
  $result = $conn->query($sql);
  if($result->num_rows>0){
   while( $row = $result->fetch_assoc()){
    $product_info[]=[
      "name"=>$row["PNAME"],
      "price"=>$row["PRICE"],
      "qty"=>$row["QTY"],
      "total"=>$row["TOTAL"],
      "process"=>$row["PROCESS"]
    ];
   }
  }
  class PDF extends FPDF
  {
    function Header()
    {
      $this->SetFont('Arial','','14'); 
      $this->Cell(50,10,"Reg No : GERPS5894MSD007",0,1);
      $this->SetY(9);
      $this->SetX(-55);
      $this->Cell(50,10,"Cell : 6987458742",0,1);

      $this->SetFont('Arial','B','40');
      $this->SetY(20);
      $this->SetX(-187);
      $this->Cell(50,20,"SELVAN CONTRACTOR",0,1);

      $this->SetFont('Arial','','14');
      $this->SetY(40);
      $this->SetX(-159);
      $this->Cell(50,7,"22, KALIYANNA GOUNDER STREET, IRUGUR,",0,1);

      $this->SetFont('Arial','','14');
      $this->SetY(48);
      $this->SetX(-132);
      $this->Cell(50,7,"COIMBATORE - 641 103",0,1);

      $this->Line(10,60,200,60);;
    }
    function body($info,$product_info){
      $this->SetY(65);
      $this->SetX(95);
      $this->SetFont('Arial','B','14'); 
      $this->Cell(50,10,"INVOICE",0,1);

      $this->SetY(80);
      $this->SetX(15);
      $this->SetFont('Arial','B','12'); 
      $this->Cell(50,10,"To",0,1);

      $this->SetY(90);
      $this->SetX(22);
      $this->SetFont('Arial','','12'); 
      $this->Cell(50,6,$info["customer"],0,1);
      $this->SetX(22);
      $this->Cell(50,6,$info["address"],0,1);
      $this->SetX(22);
      $this->Cell(50,6,$info["city"],0,1);

      $this->SetY(80);
      $this->SetX(-70);
      $this->Cell(50,6,"Invoice No :".$info["invoice_no"]);

      $this->SetY(87);
      $this->SetX(-70);
      $this->Cell(50,6,"Invoice Date :".$info["invoice_date"]);

      $this->SetY(120);
      $this->SetX(15);
      $this->SetFont('Arial','B','12'); 
      $this->Cell(50,9,"DESCRIPTION",1,0);
      $this->Cell(40,9,"PROCESS",1,0);
      $this->Cell(20,9,"PRICE",1,0,"C");
      $this->Cell(30,9,"QTY",1,0,"C");
      $this->Cell(40,9,"TOTAL",1,1,"C");


      $this->SetFont('Arial','','12'); 
      
      foreach ($product_info as $row){
        $this->SetX(15);
        $this->Cell(50,9,$row["name"],"LR",0);
        $this->Cell(40,9,$row["process"],"LR",0);
        $this->Cell(20,9,$row["price"],"R",0,"R");
        $this->Cell(30,9,$row["qty"],"R",0,"R");
        $this->Cell(40,9,$row["total"],"R",1,"R");
      }
      for($i=0;$i<10-count($product_info);$i++){
        $this->SetX(15);
        $this->Cell(50,9,"","LR",0);
        $this->Cell(40,9,"","LR",0);
        $this->Cell(20,9,"","R",0,"R");
        $this->Cell(30,9,"","R",0,"R");
        $this->Cell(40,9,"","R",1,"R");

      }
      $this->SetX(15);
      $this->SetFont('Arial','B','12'); 

      $this->Cell(140,9,"Total",1,0,"R");
      $this->Cell(40,9,$info["total"],1,0,"R");

        
    }
    function Footer()
    {
      $this->SetY(-55);
      $this->SetX(55);
      $this->SetFont('Arial','B','12'); 
      $this->Cell(0,10,"For Selvan Contractor",0,1,"R");
      $this->Ln(5);
      $this->SetFont('Arial','','12'); 
      $this->Cell(0,10,"K Selvan",0,1,"R");

      $this->SetY(-45);
      $this->SetX(20);
      $this->SetFont('Arial','','12'); 
      $this->Cell(0,10,"Date : ",0,1);
    }
  }
  $pdf = new PDF("P","mm","A4");

  $pdf->AddPage();
  $pdf->body($info,$product_info);
  $pdf ->Output(); 
?>
