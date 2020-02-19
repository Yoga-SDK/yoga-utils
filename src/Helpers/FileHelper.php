<?php

namespace Yoga\Utils\Helpers;

use Illuminate\Support\Facades\File;

class FileHelper
{
  /**
   * Writes a file into a dir
   *
   */
  static function write(string $fullPathWithFileName, string $fileContents)
  {
      $exploded = explode(DIRECTORY_SEPARATOR,$fullPathWithFileName);

      array_pop($exploded);

      $directoryPathOnly = implode(DIRECTORY_SEPARATOR,$exploded);

      if (!FileHelper::exists($directoryPathOnly)) 
      {
        FileHelper::makeDirectory($directoryPathOnly,0775,true,false);
      }
      FileHelper::put($fullPathWithFileName, $fileContents);
  }
}
