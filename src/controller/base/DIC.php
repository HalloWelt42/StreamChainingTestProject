<?php


namespace StreamChainingTestProject\controller\base;

use ArrayAccess;

/**
 * Dependency Injection Container
 *
 * Class DIC
 * @package StreamChainingTestProject\model
 */
class DIC implements ArrayAccess
{
  /**
   * @var array
   */
  private $container;

  /**
   * DIC constructor.
   */
  public function __construct() {
    $this->container = [];
  }

  /**
   * @param mixed $offset
   * @param mixed $value
   */
  public function offsetSet($offset, $value) {
    if (is_null($offset)) {
      $this->container[] = $value;
    } else {
      $this->container[$offset] = $value;
    }
  }

  /**
   * @param mixed $offset
   * @return bool
   */
  public function offsetExists($offset) {
    return isset($this->container[$offset]);
  }


  /**
   * @param mixed $offset
   */
  public function offsetUnset($offset) {
    unset($this->container[$offset]);
  }

  /**
   * @param mixed $offset
   * @return mixed|null
   */
  public function offsetGet($offset) {
    return isset($this->container[$offset]) ? $this->container[$offset] : null;
  }

}