<?php

namespace App\Validators;

class NumericValidator implements Validator
{
  public function __construct(
    private string $field,
    private string $label,
    private int $min = 0
  ) {}

  public function validate(array $input): array
  {
    $value = $input[$this->field] ?? '';

    if ($value !== '' && (!is_numeric($value) || (int)$value < $this->min)) {
      return [$this->field => "{$this->label}は{$this->min}以上の数値で入力してください。"];
    }

    return [];
  }
}
