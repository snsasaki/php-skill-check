<?php

namespace App\Validators;

use App\Validator\Validator;

class BookValidator implements Validator
{
  private array $validators;

  public function __construct()
  {
    $this->validators = [
      new RequiredValidator('title', 'タイトル'),
      new LengthValidator('title', 'タイトル', 100),
      new RequiredValidator('author', '著者'),
      new RequiredValidator('category_id', 'カテゴリ'),
      new RequiredValidator('price', '価格'),
      new NumericValidator('price', '価格', 0),
    ];
  }

  public function validate(array $input): array
  {
    $errors = [];

    foreach ($this->validators as $validator) {
      $errors = array_merge($errors, $validator->validate($input));
    }

    return $errors;
  }
}
