<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use Dompdf\Dompdf;
use Illuminate\Contracts\Session\Session;
use PDF;
use Dompdf\Options;

class PdfController extends Controller
{
  public function createPdf()
  {

    $sessao = Session()->all();
    $budget =  $sessao['budget']; 
    $amount = 0;
    $quantity =0;

   

    foreach ( $sessao['budget']['products'] as $value) {

      
        $quantity = $value["quantity"];
        $amount =  $amount + ($quantity * $value["price"]);
    }


    $options = new Options();

    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);

    
    $dompdf = PDF::loadView('client.budgetPdf', compact('budget','amount'));
    $dompdf->setPaper('a4', 'portrait');
    $dompdf->render();

    $output = $dompdf->output();
    file_put_contents("pedido.pdf", $output);



    return $dompdf->setPaper('a4')->stream('pedidos.pdf', ['Attachment' => true]);
  }
}
