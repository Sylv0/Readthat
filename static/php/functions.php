<?php
  declare(strict_types=1);
  function StrToKey(string $str): string{
    return str_replace([" ", "."], "", $str);
  }
