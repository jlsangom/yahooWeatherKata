<?php

namespace Kata;
use \GuzzleHttp\Client;


class YahooWeater {

    public function getWeater() {

        $response = $this->getXmlApiYahoWeather();

        $weatherCondition = $this->getWeatherCondition($response);

        return $weatherCondition;

        //var_dump($res->xml());
        /** @var \SimpleXMLElement $response */
        //$response = $res->xml();
        //var_dump($response->channel->item->yweather['condition']->attributes());
        //var_dump($response->channel->item->children());
    }


    protected  function getXmlApiYahoWeather()
    {
        $client = new Client();
        $res = $client->get('http://weather.yahooapis.com/forecastrss?w=2502265');

        return $res->getBody();
    }

    protected  function getWeatherCondition($xml)
    {
        $pos = strpos($xml, 'yweather:condition');
        $pos = strpos($xml, 'text="', $pos);
        $pos+=6;

        $pos1 = strpos($xml, '"', $pos);

        return substr($xml, $pos, ($pos1-$pos));


    }
} 