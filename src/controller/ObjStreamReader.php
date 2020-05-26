<?php


namespace StreamChainingTestProject\controller;


class ObjStreamReader
{

  /**
   * @var ObjPartStreamReader
   */
  private $obj_stream_reader;

  /**
   * @param ObjPartStreamReader $stream
   * @return $this
   */
  public function dependency_obj_stream_reader(ObjPartStreamReader $stream)
  {
    $this->obj_stream_reader = $stream;
    return $this;
  }

  public function read(){

    while (!$this->obj_stream_reader->end()){
      print_r(
        $this->obj_stream_reader->read_line()
      );
    }
    return '';
  }

}