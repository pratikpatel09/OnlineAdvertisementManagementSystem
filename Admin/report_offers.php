<?php

function fetch_data() {
    $output = '';
    $conn = mysqli_connect("localhost", "root", "", "oams_db");
    $sql = "SELECT * FROM offer_master om,user_offer uo WHERE om.offer_id = uo.offer_id";
    $i=0;
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $i=$i+1;
        $output .= '<tr>  
            <td>'.$i.'</td>
                          <td>' . $row["offer_id"] . '</td> 
                          <td>' . $row["u_email"] . '</td>
                          <td>' . $row["offer_name"] . '</td>  
                          <td>' . $row["start_date"] . '</td>  
                          <td>' . $row["end_date"] . '</td>
                       
                     </tr>  
                          ';
    }
    return $output;
}

if (isset($_POST["generate_pdf"])) {
    require_once('../tcpdf/tcpdf.php');
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Generate Report of User Offers");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 11);
    $obj_pdf->AddPage();
    $content = '';
    $content .= '  
        
      
      <img src="../logo/logo_adwale.png" alt="logo" height="40" width="110"/><br/>
      <h4 align="center">Generate Report of User Offers</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
           <th width="7%">#</th>
                        <th width="7%">Id</th> 
                         <th width="35%">User Email</th>
                        <th width="15%">Offer Name</th>  
                        <th width="17%">Start Date</th>  
                        <th width="17%">End Date</th>
                      
           </tr>  
      ';
    $content .= fetch_data();
    $content .= '</table>';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('offer_report file.pdf', 'I');
}
?>  
<!DOCTYPE html>  
<html>  
    <head>  
        <title>User Offers Report | AdWale</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />       
        <link rel="shortcut icon" href="../assets/images/favicon_1.ico">
    </head>  
    <body>  
        <img src="../logo/logo_adwale.png" alt="logo" />
        <br />
        <div class="container">  
            <h4 align="center"> Generate Report of User Offer</h4><br />  
            <div class="table-responsive">  
                <div class="col-md-12" align="right">
                    <form method="post">  
                        <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
                    </form>  
                </div>
                <br/>
                <br/>
                <table class="table table-bordered">  
                    <tr>  
                        <th width="6%">#</th>
                        <th width="6%">Id</th>  
                        <th width="25%">User Email</th>
                        <th width="15%">Offer Name</th>  
                        <th width="20%">Start Date</th>  
                        <th width="20%">End Date</th>
                        
                    </tr>  
                    <?php
                    echo fetch_data();
                    ?>  
                </table>  
            </div>  
        </div>  
    </body>  
</html>  