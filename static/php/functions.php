<?php
  declare(strict_types=1);

  // Remove characters for key, same as other. Could make better... 
  function StrToKey(string $str): string{
    return str_replace([" ", "."], "", $str);
  }
