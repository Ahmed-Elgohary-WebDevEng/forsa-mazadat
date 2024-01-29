<?php

namespace App\Services;

class Jawaly
{
    /**
     *
     * @param mixed $phone
     * @param string $message
     * @return mixed
     */
    public static function send($phone, string $message = '')
    {
        $curl = curl_init();
        $app_id = config('jawaly.app_key');
        $app_sec = config('jawaly.app_secret');
        $app_hash  = base64_encode("$app_id:$app_sec");
        $messages = [];
        $messages["messages"] = [];
        if (is_array($phone)) {
            foreach ($phone as $index => $number) {
                $messages["messages"][$index]["text"] = $message;
                $messages["messages"][$index]["numbers"][] = $number;
                $messages["messages"][$index]["sender"] = config('jawaly.sender');
            }
        } else {
            $messages["messages"][0]["text"] = $message;
            $messages["messages"][0]["numbers"][] = $phone;
            $messages["messages"][0]["sender"] = config('jawaly.sender');
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => config('jawaly.url'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($messages),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Basic ' . $app_hash
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
