<?php

namespace App\Libraries;

class UtilityLib
{
  public function pesan(string $str, $class)
  {
    $str = preg_replace("/<s>/i", "<strong>", $str);
    $str = preg_replace("/<\/s>/i", "</strong>", $str);
    $pesan = '<div class="alert alert-' . $class . ' alert-dismissible fade show" role="alert">
        ' . $str . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';

    session()->setFlashdata('pesan', $pesan);
  }
}
