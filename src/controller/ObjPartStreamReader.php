<?php


namespace StreamChainingTestProject\controller;


use StreamChainingTestProject\controller\base\File;

class ObjPartStreamReader
{

  /**
   * @var File
   */
  private $file;

  /**
   * @var string
   */
  private $line;

  /**
   * @var bool
   */
  private $end;

  /**
   * @param File $file
   * @return $this
   */
  public function dependency_file($file)
  {
    $this->file = $file;
    return $this;
  }

  /**
   * @return string
   */
  public function read_line()
  {

    while (!$this->file->eof()) {
      if ($this->validate()) {
        break;
      }
      $this->line = $this->file->getCurrentLine();
    }

    $this->end = $this->file->eof();
    $output = $this->line;
    $this->line = '';
    return $output;

  }


  /**
   * @return bool
   */
  public function end()
  {
    return $this->end;
  }

  /**
   * @return bool
   */
  private function validate()
  {
    return preg_match('/^\{[0-9]{3}\}/', $this->line) ? TRUE : FALSE;
  }
}