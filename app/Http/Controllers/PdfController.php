<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Dompdf\Options as DomPdf;
use Illuminate\Http\Response

class PdfController extends Controller
{
    private PDF $pdf;

    public function __construct(PDF $pdf, DomPdf $domPdf)
    {
        $this->pdf = $pdf;
        $this->domPdf = $domPdf;
    }

    public function createPdf(): Response
    {
        $sessao = Session()->all();
        $budget =  $sessao['budget'];
        $amount = 0;

        foreach ( $sessao['budget']['products'] as $value) {
            $quantity = $value["quantity"];
            $amount =  $amount + ($quantity * $value["price"]);
        }

        $this->domPdf->set('isRemoteEnabled', true);
        $dompdf = $this->pdf->loadView('client.budgetPdf', compact('budget', 'amount'));
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();

        file_put_contents("pedido.pdf", $dompdf->output());

        return $dompdf->setPaper('a4')->stream('pedidos.pdf', ['Attachment' => true]);
    }
}
