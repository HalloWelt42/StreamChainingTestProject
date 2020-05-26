<?php


namespace StreamChainingTestProject;


use StreamChainingTestProject\controller\base\DIC;
use StreamChainingTestProject\controller\base\File;
use StreamChainingTestProject\controller\ObjStreamReader;
use StreamChainingTestProject\controller\ObjPartStreamReader;
use StreamChainingTestProject\controller\ObjGroupStreamReader;

class App
{
  public function __construct()
  {

    $dic = new DIC();


    $dic['file_source'] = function () {
      return __DIR__ . DIRECTORY_SEPARATOR . 'source' . DIRECTORY_SEPARATOR . 'source.txt';
    };

    $dic[File::class] = function () use ($dic) {
      return new File($dic['file_source']());
    };

    $dic[ObjPartStreamReader::class] = function () use ($dic) {
      return (new ObjPartStreamReader())
          ->dependency_file($dic[File::class]());
    };

    $dic[ObjStreamReader::class] = function () use ($dic) {
      return (new ObjStreamReader())
          ->dependency_obj_stream_reader($dic[ObjPartStreamReader::class]());
    };

    $dic[ObjGroupStreamReader::class] = function () use ($dic) {
      return (new ObjGroupStreamReader())
          ->dependency_obj_stream_reader($dic[ObjStreamReader::class]());
    };

    #$dic[ObjGroupStreamReader::class]();
    /**
     * @var $reader ObjStreamReader
     */
    $reader = $dic[ObjStreamReader::class]();
    print_r($reader->read());
#    print_r($reader->read_line());

  }
}