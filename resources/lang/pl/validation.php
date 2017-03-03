<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Pole :attribute musi byc zaakceptowany.',
    'active_url'           => 'Pole :attribute nie jest prawidłowym URL.',
    'after'                => 'Pole :attribute musi być datą po :date.',
    'alpha'                => 'Pole :attribute musi zawierać tylko litery.',
    'alpha_dash'           => 'Pole :attribute musi zwierać tylko liczby, litery i podkreślniki.',
    'alpha_num'            => 'Pole :attribute musi zawierać litery i cyfry.',
    'array'                => 'Pole :attribute mmusi być tabilcą.',
    'before'               => 'Pole :attribute musi być datą przed :date.',
    'between'              => [
        'numeric' => 'Pole :attribute musi być pomiędzy :min i :max.',
        'file'    => 'Pole :attribute musi być pomiędzy :min i :max kilobytes.',
        'string'  => 'Pole :attribute musi być pomiędzy :min i :max characters.',
        'array'   => 'Pole :attribute musi być pomiędzy :min i :max items.',
    ],
    'boolean'              => 'Pole :attribute  musi być prawą lub fałszem.',
    'confirmed'            => 'Pole :attribute potwierdzenia nie pasuje.',
    'date'                 => 'Pole :attribute nie jest prawidłowa datą.',
    'date_format'          => 'Pole :attribute nie pasuje do formatu :format.',
    'different'            => 'Pole :attribute i :other mmuszą być różne.',
    'digits'               => 'Pole :attribute muszą być :digits cyframi.',
    'digits_between'       => 'Pole :attribute musi byc pomiędzy :min i :max digits.',
    'distinct'             => 'Pole :attribute ma powtórzoną wartość.',
    'email'                => 'Pole :attribute musi być poprawnym adresem email.',
    'exists'               => 'Wybrany Pole :attribute jest nieprawidłowy.',
    'filled'               => 'Pole :attribute jest wymagane.',
    'image'                => 'Pole :attribute musi byc obrazkiem.',
    'in'                   => 'Wybrany Pole :attribute jest nieprawidłowy.',
    'in_array'             => 'Pole :attribute  nie istnieje w  :other.',
    'integer'              => 'Pole :attribute musi być liczbą całkowitą.',
    'ip'                   => 'Pole :attribute musi byc prawidłowym adresem IP.',
    'json'                 => 'Pole :attribute musi być prawidłowym łańcuchem JSON.',
    'max'                  => [
        'numeric' => 'Pole :attribute nie może być większy niż :max.',
        'file'    => 'Pole :attribute nie może być większy niż :max kilobajtów.',
        'string'  => 'Pole :attribute nie może być większy niż :max znaków.',
        'array'   => 'Pole :attribute nie może być większy niż :max przedmiotów.',
    ],
    'mimes'                => 'Pole :attribute musi byc plikiem typu: :values.',
    'min'                  => [
        'numeric' => 'Pole :attribute musi być mniejszy niż :min.',
        'file'    => 'Pole :attribute musi być mniejszy niż :min kilobajtów.',
        'string'  => 'Pole :attribute musi być mniejszy niż :min znaków.',
        'array'   => 'Pole :attribute musi być mniejszy niż :min przedmiotów.',
    ],
    'not_in'               => 'Wybrany Pole :attribute jest nieprawidłowy.',
    'numeric'              => 'Pole :attribute musi być liczbą.',
    'present'              => 'Pole :attribute jest wymagany.',
    'password'             => 'Pole :attribute jest wymagane.',
    'regex'                => 'Pole :attribute jest nieprawidłowy.',
    'required'             => 'Pole :attribute jest wymagane.',
    'required_if'          => 'Pole :attribute jest wymagany kiedy :other is :value.',
    'required_unless'      => 'Pole :attribute jest wymagany chyba, że :other zawiera :values.',
    'required_with'        => 'Pole :attribute jest wymagany kiedy :values jest obecny.',
    'required_with_all'    => 'Pole :attribute jest wymagany kiedy :values jest obecny.',
    'required_without'     => 'Pole :attribute jest wymagany kiedy :values nie jest obecny.',
    'required_without_all' => 'Pole :attribute jest wymagany kiedy żaden z :values nie jest obecny.',
    'same'                 => 'Pole :attribute i :other muszą do siebie pasować.',
    'size'                 => [
        'numeric' => 'Pole :attribute musi mieć :size.',
        'file'    => 'Pole :attribute musi mieć :size kilobajtów.',
        'string'  => 'Pole :attribute musi mieć :size znaków.',
        'array'   => 'Pole :attribute musi zawierać :size przedmiotów.',
    ],
    'string'               => 'Pole :attribute musi być ciągiem znaków.',
    'timezone'             => 'Pole :attribute musi być strefą.',
    'unique'               => 'Pole :attribute nie jest dotępny.',
    'url'                  => 'Pole :attribute formatu jest nieprawidłowy.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
      'password'=>'hasło',
    ],

];
