<?php /**
 *
 */
class Waktu
{

  function __construct()
  {
    $this->CI =& get_instance();
  }

  function elapsedTime($time_since) {
    date_default_timezone_set("Asia/Bangkok");
    $time = time() - $time_since;
    $tokens = array (
        31536000 => 'tahun',
        2592000 => 'bulan',
        604800 => 'minggu',
        86400 => 'hari',
        3600 => 'jam',
        60 => 'menit',
        1 => 'detik',
        
    );
    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'':'');
        }
    }
  }

 ?>
