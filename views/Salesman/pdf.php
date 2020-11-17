<?php
include_once ('../../vendor/autoload.php');
use App\Auth\Auth;
use App\Message\Message;
use App\User\User;
use App\Supershop\Supershop;

include_once ('../../src/Auth/Auth.php');
include_once ('../../src/User/User.php');
include_once ('../../src/Message/Message.php');
include_once ('../../src/Supershop/Supershop.php');

//var_dump($_GET);

$obj= new Supershop();

//var_dump($_POST);die();
$obj->prepare($_GET);
$allData=$obj->getAllforInvoice();
$accounts=$obj->getAllforAmounts();
//var_dump($allData);die();

$trs="";
$taka="";
$sl=0;
foreach($allData as $data):
    $sl++;
    $trs.="<tr class='text-center'>";
    $trs.="<td class='text-center'> $sl</td>";
    $trs.="<td class='text-center'> $data->invoice_no</td>";
    $trs.="<td class='text-center'> $data->p_name</td>";
    $trs.="<td class='text-center'> $data->quantity</td>";
    $trs.="<td class='text-center'> $data->unit_price</td>";
    $trs.="<td class='text-center'> $data->total_taka</td>";
    $trs.="</tr>";
endforeach;

foreach ($accounts as $acc):
    $taka.="<h3>Net Amounts: <span>$acc->net_amount</span></h3>";
    $taka.="<h3>Received: <span>$acc->net_amount</span></h3>";
    $taka.="<h5>Date: <span>$acc->date</span></h5>";
    $taka.="<h5>Time: <span>$acc->time</span></h5>";
    endforeach;
$html= <<<BITM


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <h3 class="red text-center">Super Shop</h3>
            <h3 class="red text-center">voucher</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                <table class="table table-bordered"> 
                    <thead>
                         <tr>
                            <th style="margin-right: 20px;">Sl.</th>
                            <th style="margin-right: 20px;">Incoice No</th>
                            <th style="margin-right: 20px;">P name</th>
                            <th style="margin-right: 20px;">Quantity</th>
                            <th style="margin-right: 20px;">Unit Price</th>
                            <th style="margin-right: 20px;">Total Taka</th>
                          </tr>
                    </thead>
                    <tbody class="text-center">
                      $trs
                    </tbody>
                </table>
                
                $taka
    </div>
 
</div>

BITM;


// Require composer autoload
require_once ('../../vendor/mpdf/mpdf/mpdf.php');
//Create an instance of the class:

$mpdf = new mPDF();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('voucher.pdf', 'D');