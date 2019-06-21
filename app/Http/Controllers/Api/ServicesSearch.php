<?php
namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use App\Breed;

class ServicesSearch {

    public function __construct(Breed $breed)
    {
        $this->breed = $breed;
        $this->externalUrl = "https://api.thecatapi.com/v1/breeds/";
    }

    public function connectDB()
    {
        try {
           DB::connection()->getPdo();
           return true;
        }
        catch(\Exception $e) {
            report($e);
            return false;
        }
    }

    public function searchApi($name)
    {
        try {
            $urlCatApi = $this->externalUrl . "search?q=$name";
            $response = $this->curl($urlCatApi);
            $array = json_decode($response, true);

            return $array;
            } catch(\Exception $e)
            {
                report($e);
                return false;
            }
    }

    public function searchDataBase($name)
    {
        try
        {
           $dataBreed = $this->breed->where('name', 'like', '%' . $name . '%')->get();
           return $dataBreed;
        } catch(\Exception $e)
        {
            report($e);
            return false;
        }
    }

    public function serachById($id)
    {
        try
        {
           $dataBreed = $this->breed->where('id', 'like', '%' . $name . '%')->get();
           return $dataBreed;
        } catch(\Exception $e)
        {
            report($e);
            return false;
        }
    }

    public function storageLocal($name)
    {
        try
        {
            $urlCatApi = $this->externalUrl . "search?q=$name";

            $response = $this->curl($urlCatApi,'GET');
            $data = json_decode($response, true);

            foreach($data as $key => $value){
                Breed::create([
                    'id' => $value['id'],
                    'name' => $value['name'],
                    'description' => $value['description'],
                    'temperament' => $value['temperament'],
                    'life_span' => $value['life_span'],
                    'origin' => $value['origin']
                ]);
            }
            return $data;
        } catch(\Exception $e)
        {
            report($e);
            return false;
        }
    }

    public function apiStore()
    {
        $response = $this->curl($this->externalUrl);
        $array = json_decode($response, true);
        foreach ($array as $key => $value)
        {
            Breed::create([
                'id' => $value['id'],
                'name' => $value['name'],
                'description' => $value['description'],
                'temperament' => $value['temperament'],
                'life_span' => $value['life_span'],
                'origin' => $value['origin'],
            ]);
        }
    }

    private function curl($url, $method = null)
    {
        if (!$method) $method = "GET";
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => "", CURLOPT_MAXREDIRS => 10, CURLOPT_TIMEOUT => 30, CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, CURLOPT_CUSTOMREQUEST => $method, CURLOPT_HTTPHEADER => array("x-api-key: DEMO-API-KEY"),)
            );
            $response = curl_exec($curl);

            curl_close($curl);
            return $response;
        }
    }
