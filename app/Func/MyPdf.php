<?php

namespace App\Func;


use Illuminate\Support\Str;

use PDF;

// require base_path("vendor/tecnickcom/tcpdf/tcpdf_autoconfig.php");



class MyPdf
{

    public $mail = null;

    public function __construct()
    {
    }


    public function certificate($quote)
    {

        // Create a new TCPDF object
        // $pdf = new PDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf = new PDF('P', 'mm', array(216, 279), true, 'UTF-8', false);

        $created_at = date("d-m-Y");
       
        $pdf::setHeaderCallback(function ($pdf) {


        });

        $pdf::setFooterCallback(function ($pdf) {

        });


        // set document information
        $pdf::SetCreator('TCPDF');
        $pdf::SetAuthor(config('app.name'));
        $pdf::SetTitle('Insurance Certificate - ' . $quote->policy_number);
        $pdf::SetSubject('Insurance Certificate - ' . $quote->policy_number);

        // set margins to 1 inch (72 points) on all sides
        // $pdf::SetMargins(10, 10);
        // Set margins
        $margin = 0.75 * 25.4;  //inch to mm
        $margin2 = 0.75 * 40.4;  //inch to mm
        $pdf::SetMargins($margin2, $margin, $margin2);
        // Set auto page breaks
        // $pdf->SetAutoPageBreak(TRUE, 0.75);

        // add a page
        // $pdf::AddPage();
        $pdf::AddPage('P', array(215.9, 279.4));



        // $image_path = ""base_path("storage/app/public/" . $cdata->logo);
        // $image_path = url("storage/" . $cdata->logo);





        $html = "
<style>

.first_header{ font-size: 15px; font-weight: bold; color: #275c58; line-height: 100%; }

.header{ font-size: 13px; font-weight: bold; color: #275c58; }

.normal{ font-size: 9px; font-weight: normal; color: #333;}

.normal_table{ padding: 2px 0px;}

.line{color: #CCC; background-color: #CCC;}

</style>";

$html .= '<table style="width:100%; padding:0px 20px 0px 0px ;">
            <tr>
            <td style="width: 50%"><table class="normal_table">
                <tr><td  class="first_header">Certificate of Motor Insurance</td></tr>
                <tr><td  class="normal">Here is your insurance certificate and policy schedule.</td></tr>
                <tr><td  class="normal">Policy extensions are visible even after the expiration date</td></tr>

                <tr><td  class="header"><br><br>Policyholder</td></tr>
                <tr><td  class="normal"><b>Name: </b>  '.$quote->first_name.' '.$quote->middle_name.' '.$quote->last_name.'</td></tr>
                <tr><td  class="normal"><b>Date of Birth: </b>  '.date('d-m-Y', strtotime($quote->date_of_birth)).'</td></tr>
            </table>
            </td>


            <td style="width: 50%">
            <table class="normal_table">
                <tr><td  class="normal"><b>Policy Number: </b>  '.$quote->policy_number.'</td></tr>
                <tr><td  class="normal"><b>Valid From: </b>  '.date('d-m-Y', strtotime($quote->start_date)).' '.$quote->start_time.'</td></tr>
                <tr><td  class="normal"><b>Valid Until: </b>  '.date('d-m-Y', strtotime($quote->end_date)).' '.$quote->end_time.'</td></tr>
               
                
               <tr><td> <br><br>
               <span>             </span><table class="normal_table">
                    <tr><td  class="header">Vehicle</td></tr>
                    <tr><td  class="normal"><b>Make: </b>  '.$quote->vehicle_make.'</td></tr>
                    <tr><td  class="normal"><b>Model: </b>  '.$quote->vehicle_model.'</td></tr>
                    <tr><td  class="normal"><b>Engine CC: </b>  '.$quote->engine_cc.'</td></tr>
                    <tr><td  class="normal"><b>Registration Number: </b>  '.$quote->reg_number.'</td></tr>
                </table></td></tr>
               </table> 
            </td>
            
            </tr>
        </table>


        <table class="normal_table">

         </table><br><hr class="line"><br><table class="normal_table">
        
        <tr><td  class="header">Coverage</td></tr> 
        <tr><td  class="normal">The insurance policy provides comprehensive coverage for social, domestic, and pleasure purposes, including commuting. Additionally, it includes Class 1 business use. </td></tr>
        
        </table><br><hr class="line"><br><table class="normal_table">
        
        <tr><td  class="header">Restrictions & Exclusions</td></tr> 
        <tr><td  class="normal"><b>- Does not </b> cover the carriage of passengers or goods for hire or reward.</td></tr>
        <tr><td  class="normal"><b>- Only </b> provides coverage for the policyholder to drive the vehicle.</td></tr>
        <tr><td  class="normal"><b>- Does not </b> provide coverage for the recovery of an impounded vehicle.</td></tr>
        <tr><td  class="normal"><b>- Please refer to your full policy </b> document to familiarize yourself with any specific restrictions and exclusions that may apply to your insurance coverage.</td></tr>
       

        </table><br><hr class="line"><br><table class="normal_table">
        
        <tr><td  class="header">Endorsements</td></tr> 
        <tr><td  class="normal"><b>- Accidental Damage Fire & Theft Excess (001) -</b></td></tr>
        <tr><td  class="normal">We will not be liable to cover the initial amount, as indicated below, for any claims or series of claims arising from a single event covered by the Accidental Damage Section and/or Fire and Theft Section of  your policy.</td></tr>       


        </table><br><hr class="line"><br><table class="normal_table">
        
        <tr><td  class="header">Excess</td></tr> 
        <tr><td  class="normal">The mandatory excess for accidental damage, fire, and theft is set at</td></tr>
        <tr><td  class="normal"><b>£250</b></td></tr>  
        

        
        </table><br><hr class="line"><br><table class="normal_table">
        
        <tr><td  class="header">Contact</td></tr> 
        <tr><td  class="normal">For any inquiries or if you need to contact Starling regarding your policy, please  email '.config('services.contact.address').'  We will respond to your message as promptly
        as possible.</td></tr>  
        
        
        
        </table><br><hr class="line"><br><table class="normal_table">
        
        <tr><td  class="header">Underwriter Declaration</td></tr> 
        <tr><td  class="normal">I confirm that the insurance mentioned in this Certificate complies with the applicable laws in Great Britain, Northern
        Ireland, the Isle of Man, the Island of Guernsey, the Island of Jersey, and the Island of Alderney. This certification is
        provided on behalf of the authorized insurers, Mulsanne Insurance Company Limited. Mulsanne Insurance Company
        Limited is licensed by the Financial Services Commission in Gibraltar to conduct insurance operations under the
        Financial Services (Insurance Companies) Act.</td></tr> 
        
        </table>
        
        '; 
        




        //die($html);
// output the HTML content
        $pdf::writeHTML($html, true, false, true, false, '');

        $filename = Str::slug("Insurance-Certificate-".$quote->policy_number);

        $pdf::Output($filename . '.pdf', 'I');
        die();



        // if ($inline_display) {
        //     // output PDF to browser or file
        //     $pdf::Output('testProjectInvoice.pdf', 'I');
        //     die();
        // } else {
        //     return $pdf::Output('', 'S'); // Save the PDF content as a string (no filename)
        // }

    }






}
