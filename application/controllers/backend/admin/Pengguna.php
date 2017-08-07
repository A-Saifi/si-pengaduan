<?php
/**
 *
 */
class Pengguna extends Backend
{

  function __construct()
  {
    parent::__construct();
    $this->is_admin();
  }

  public function index()
  {

    $this->load->model('Penduduk_model');

    $pengguna = $this->Penduduk_model->get_all_penduduk_admin();

    $data = [
      'tittle' => 'admin',
      'pengguna' => $pengguna,
      'header' => 'Pengguna',
      'crumb' =>  [
                    ['label'=>'Admin','link'=>'admin/admin'],
                    ['label'=>'pengguna','link'=>'admin/admin/pengguna'],
                      ],
      'sidebar' => 7,
      'script' => [
                        ['nama' => 'datatables', ],
                ],
    ];
    $this->layout->load_backend('backend/admin/index', $data);
  }

  public function save_download()
 {
   //load mPDF library
   $this->load->library('m_pdf');
   //load mPDF library

    $this->load->model('Penduduk_model');
   //now pass the data//
    $this->data['title']="Daftar penduduk";
    $this->data['description']="Penduduk di kabupaten sukoharjo";
    $this->data['pengguna']=$this->Penduduk_model->get_all_penduduk_admin();
    //now pass the data //


   $html= $this->load->view('backend/pdf_output',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.

   //this the the PDF filename that user will get to download
   $pdfFilePath ="laporkan-".time()."-download.pdf";


   //actually, you can pass mPDF parameter on this load() function
   $pdf = $this->m_pdf->load();
   //generate the PDF!

   $pdf->WriteHTML($html,2);
   //offer it to user via browser download! (The PDF won't be saved on your server HDD)
   $pdf->Output($pdfFilePath, "D");


 }

 public function kecamatan($id_kec)
 {
   $this->load->model('Penduduk_model');
   $pengguna = $this->Penduduk_model->get_all_penduduk_admin_kecamatan($id_kec);
   $data = [
     'pengguna' => $pengguna,
     'tittle' => 'Admin : Daftar Kecamatan',
     'header' => 'Pengguna',
     'small' => 'Pada Kecamatan '.ucwords($this->input->get('kecamatan')),
     'crumb' =>  [
                   ['label'=>'Admin','link'=>'admin/admin'],
                   ['label'=>'pengguna','link'=>'admin/admin/pengguna'],
                     ],
     'sidebar' => 10+$id_kec,
     'script' => [
                       ['nama' => 'datatables', ],
               ],
   ];

   $this->layout->load_backend('backend/admin/pengguna/daftar_kecamatan', $data);
 }

}

 ?>
