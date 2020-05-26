<?php


namespace StreamChainingTestProject\controller;


class ObjGroupStreamReader
{

  private $obj_stream_reader;


  /**
   * @param ObjStreamReader $stream
   * @return ObjGroupStreamReader
   */
  public function dependency_obj_stream_reader(ObjStreamReader $stream)
  {
    $this->obj_stream_reader = $stream;
    return $this;
  }

}