<?php

class ValorantAPI
{
    private $endpoints = [
        'get_account' => 'https://api.henrikdev.xyz/valorant/v1/account/<username>/<tag>',
        'get_matches' => 'https://api.henrikdev.xyz/valorant/v3/matches/<region>/<username>/<tag>',
        'get_current_mmr' => 'https://api.henrikdev.xyz/valorant/v1/mmr/<region>/<username>/<tag>',
        'get_mmr_history' => 'https://api.henrikdev.xyz/valorant/v1/mmr-history/<region>/<username>/<tag>',
        'get_match' => 'https://api.henrikdev.xyz/valorant/v2/match/<match_id>'
    ];

    private function get_api_url($endpoint_type, $parameters = [])
    {
        if (!isset($this->endpoints[$endpoint_type]))
            return false;

        $url = $this->endpoints[$endpoint_type];
        foreach ($parameters as $key => $value)
            $url = str_replace('<' . trim($key) . '>', trim($value), $url);

        return $url;
    }

    private function send_request($endpoint, $method, $parameters)
    {
        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($parameters));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($parameters))
        ]);
        $result = curl_exec($ch);

        return $result;
    }

    public function get_account($username, $tag)
    {
        $endpoint = $this->get_api_url('get_account', [
            'username' => $username,
            'tag' => $tag
        ]);
        $result = $this->send_request($endpoint, 'GET', []);
        $result = json_decode($result, true);

        if ($result['status'] != 200)
            return false;

        return $result['data'];

    }

    public function get_matches($region, $username, $tag)
    {
        $endpoint = $this->get_api_url('get_matches', [
            'region' => $region,
            'username' => $username,
            'tag' => $tag
        ]);
        $result = $this->send_request($endpoint, 'GET', []);
        $result = json_decode($result, true);

        if ($result['status'] != 200)
            return false;

        return $result['data'];
    }

    public function get_match($match_id)
    {
        $endpoint = $this->get_api_url('get_match', [
            'match_id' => $match_id
        ]);
        $result = $this->send_request($endpoint, 'GET', []);
        $result = json_decode($result, true);

        if ($result['status'] != 200)
            return false;

        return $result['data'];
    }

    public function get_current_mmr($region, $username, $tag)
    {
        $endpoint = $this->get_api_url('get_current_mmr', [
            'region' => $region,
            'username' => $username,
            'tag' => $tag
        ]);
        $result = $this->send_request($endpoint, 'GET', []);
        $result = json_decode($result, true);

        if ($result['status'] != 200)
            return false;

        return $result['data'];
    }

    public function get_mmr_history($region, $username, $tag)
    {
        $endpoint = $this->get_api_url('get_mmr_history', [
            'region' => $region,
            'username' => $username,
            'tag' => $tag
        ]);
        $result = $this->send_request($endpoint, 'GET', []);
        $result = json_decode($result, true);

        if ($result['status'] != 200)
            return false;

        return $result['data'];
    }
}

?>