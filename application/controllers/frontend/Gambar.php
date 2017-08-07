<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Gambar extends Frontend
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Gambar_pengaduan_model');
  }

  public function hapus($id_pengaduan, $id)
  {
    if(isset($id))
       {
           $this->Gambar_pengaduan_model->delete_gambar_pengaduan($id);
           redirect(base_url('pengaduan/edit/'.$id_pengaduan));
       }
       else show_error('The gambar_pengaduan you are trying to delete does not exist.');
   }

}





?>
