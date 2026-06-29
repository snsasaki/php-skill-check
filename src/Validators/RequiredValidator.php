<?php

namespace App\Validators;

class RequiredValidator implements Validator
{
  public function __construct(
    private string $field,
    private string $label
  ) {}

  public function validate(array $input): array
  {
    $value = $input[$this->field] ?? '';

    if ($value === '') {
      return [$this->field => "{$this->label}は必須です。"];
    }

    return [];
  }
}
