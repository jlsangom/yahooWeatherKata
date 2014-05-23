<?php

namespace Kata\Tests;


use Kata\YahooWeater;

class YahooWaterTest extends \PHPUnit_Framework_TestCase {

    protected $reponse = '<link>http://us.rd.yahoo.com/dailynews/rss/weather/Sunnyvale__CA/*http://weather.yahoo.com/forecast/USCA1116_f.html</link>
    <pubDate>Fri, 18 Dec 2009 9:38 am PST</pubDate>
    <yweather:condition  text="Mostly Cloudy"  code="28"  temp="50"  date="Fri, 18 Dec 2009 9:38 am PST" />
    <description>';

    /**
     * @test
     */
     public function nyWeater()
     {
         $yahooWeater = $this->getMock('Kata\YahooWeater', array('getXmlApiYahoWeather'));

         $yahooWeater
             ->expects($this->once())
             ->method('getXmlApiYahoWeather')
             ->will($this->returnValue($this->reponse));

         $this->assertEquals('Mostly Cloudy', $yahooWeater->getWeater());
     }

     private function callApiYahoo()
     {

     }
}
 