<?php

namespace App\Validators;

use App\Validator\Validator;

class LengthValidator implements Validator
{
  public function __construct(
    private string $field,
    private string $label,
    private int $max
  ) {}

  public function validate(array $input): array
  {
    $value = $input[$this->field] ?? '';

    if ($value !== '' && mb_strlen($value) > $this->max) {
      return [$this->field => "{$this->label}は{$this->max}文字以内で入力してください。"];
    }

    return [];
  }
}
