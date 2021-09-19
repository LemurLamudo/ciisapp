<?php

use Dompdf\Dompdf;

class certificadoController extends Controller{
    public function __construct(){
        validate_token();
    }

    public function index(){
        $data =
        [
            'title' => 'Nuami Framework',
            'bg'    =>  'dark'
        ];
        View::render('certificado', $data);
    }

    public function generate(){

        // Introducimos HTML de prueba
        $html = "<body style='background: url(http://1.bp.blogspot.com/-DKFKsZSOsAU/UXjiY_b5FDI/AAAAAAAADS0/tAniC34Sdzg/s1600/pixar-animation-studios.jpg) 
        no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;)';></body>";
        
        // Instanciamos un objeto de la clase DOMPDF.
        $pdf = new Dompdf();
        
        // Definimos el tamaño y orientación del papel que queremos.
        $pdf->set_paper("A4", "landscape");
        
        // Cargamos el contenido HTML.
        $pdf->load_html(utf8_decode($html));
        
        // Renderizamos el documento PDF.
        $pdf->render();
        
        // Enviamos el fichero PDF al navegador.
        $pdf->stream('certificado.pdf');
    }

}
