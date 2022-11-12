<?php
class Model_api extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->API = "https://www.emsifa.com/api-wilayah-indonesia/api/";
    }

    public function daerah($cari = "provinces", $id = null)
    {
        $ch = curl_init();
        if($id != null){
            $url = $this->API . $cari . '/' . $id . '.json';
        } else {
            $url = $this->API . $cari . '.json';
        }
        // https://emsifa.github.io/api-wilayah-indonesia/api/province/{provinceId}.json
        // https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{provinceId}.json
        // https://emsifa.github.io/api-wilayah-indonesia/api/regency/{regencyId}.json
        // if ($id != null) {
        //     if ($nama_id == null) {
        //         $url .= "/" . $id;
        //     } else {
        //         $url .= "?" . $nama_id . "=" . $id;
        //     }
        // }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response === false) {
            print_r('Curl error: ' . curl_error($ch));
            die;
        }

        return $response;
    }
}
