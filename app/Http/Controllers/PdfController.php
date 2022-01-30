<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use Illuminate\Contracts\Session\Session;
use PDF;

class PdfController extends Controller
{
    public function createPdf()
    {

      $sessao = Session()->all();
       
        $budget =  $sessao['budget'];
        $pdf = PDF::loadView('client.budgetPdf', compact('budget'));
        $pdf->setPaper('a4', 'landscape');
        $pdf->render();

        $output = $pdf->output();
        file_put_contents("pedido.pdf", $output);

       

        return $pdf->setPaper('a4')->stream('pedidos.pdf', ['Attachment' => true]);
    }
}
