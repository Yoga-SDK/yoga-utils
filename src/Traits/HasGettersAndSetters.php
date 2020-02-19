<?php

namespace Yoga\Utils\Traits;

use Illuminate\Support\Str;


trait HasGettersAndSetters
{

  /**
   * Magic Method Call
   *
   */
  function __call($method, $arguments)
  {

    // Guess property name
    $property = Str::camel(substr($method, 3));
    
    // Check if it is a getter
    if (Str::startsWith($method, 'get')) {
      return $this->$property;
    }

    // Checks if it is a setter
    if (Str::startsWith($method, 'set')) {
      $this->$property = $arguments[0];
      return $this;
    }

    // Throws an error by default
    throw new \Error('Call to undefined method '.$method);
  }
}
