<?php

namespace App\Validator;

interface Validator
{
  public function validate(array $input): array;
}
