<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute mora biti sprejet.',
    'active_url'           => ':attribute ni veljaven URL.',
    'after'                => ':attribute mora bit datum po :date.',
    'after_or_equal'       => ':attribute mora bit datum po ali enak :date.',
    'alpha'                => ':attribute lahko vsebuje le črke.',
    'alpha_dash'           => ':attribute lahko vsebuje le črke, številke in pomišljaje.',
    'alpha_num'            => ':attribute lahko vsebuje le črke, številke.',
    'array'                => ':attribute mora biti tabela.',
    'before'               => ':attribute mora biti datum pred :date.',
    'before_or_equal'      => ':attribute mora biti datum pred ali enak :date.',
    'between'              => [
        'numeric' => ':attribute mora biti med :min in :max.',
        'file'    => ':attribute mora biti med :min in :max kilobajti.',
        'string'  => ':attribute mora biti med :min in :max znaki.',
        'array'   => ':attribute mora imeti med :min in :max elementov.',
    ],
    'boolean'              => ':attribute polje mora biti true ali false.',
    'confirmed'            => ':attribute potrdilo se ne ujema.',
    'date'                 => ':attribute ni veljaven datum.',
    'date_format'          => ':attribute ne ustreza formatu :format.',
    'different'            => ':attribute in :other morata biti različna.',
    'digits'               => ':attribute mora biti :digits številka.',
    'digits_between'       => ':attribute mora biti med :min and :max številkami.',
    'dimensions'           => ':attribute ima napačne dimenzije slik.',
    'distinct'             => ':attribute polje ima podvojen vnos.',
    'email'                => ':attribute mora biti veljavni email naslov.',
    'exists'               => 'izbran :attribute je napačen.',
    'file'                 => ':attribute mora biti datoteka.',
    'filled'               => ':attribute field mora imeti vrednost.',
    'image'                => ':attribute mora biti slika.',
    'in'                   => 'izbran :attribute je neveljaven.',
    'in_array'             => ':attribute polje ne obstaja v :other.',
    'integer'              => ':attribute mora biti število.',
    'ip'                   => ':attribute mora biti veljaven IP naslov.',
    'ipv4'                 => ':attribute mora biti veljaven IPv4 naslov.',
    'ipv6'                 => ':attribute mora biti veljaven IPv6 naslov.',
    'json'                 => ':attribute mora biti veljaven JSON niz.',
    'max'                  => [
        'numeric' => ':attribute ne sme bit večji :max.',
        'file'    => ':attribute ne sme bit večji :max kilobytes.',
        'string'  => ':attribute ne sme bit večji :max characters.',
        'array'   => ':attribute ne sme vsebovati več elementov kot :max items.',
    ],
    'mimes'                => ':attribute mora biti a datoteka tipa: :values.',
    'mimetypes'            => ':attribute mora biti a datoteka tipa: :values.',
    'min'                  => [
        'numeric' => ':attribute mora biti vsaj :min.',
        'file'    => ':attribute mora biti vsaj :min kilobajtov.',
        'string'  => ':attribute mora biti vsaj :min znakov.',
        'array'   => ':attribute mora imeti vsaj :min elementov.',
    ],
    'not_in'               => 'izbran :attribute je napačen.',
    'numeric'              => ':attribute mora biti šteivlo.',
    'present'              => ':attribute polje mora biti izpolnjeno.',
    'regex'                => ':attribute format je napačen.',
    'required'             => ':attribute polje je obvezno.',
    'required_if'          => ':attribute polje je obvezno ko :other je :value.',
    'required_unless'      => ':attribute polje je obvezno ko ni :other je v :values.',
    'required_with'        => ':attribute polje je obvezno ko :values obstaja.',
    'required_with_all'    => ':attribute polje je obvezno ko :values obstaja.',
    'required_without'     => ':attribute polje je obvezno ko :values ne obstaja.',
    'required_without_all' => ':attribute polje je obvezno ko nobena od :values obstajajo.',
    'same'                 => ':attribute and :other must match.',
    'size'                 => [
        'numeric' => ':attribute mora biti :size.',
        'file'    => ':attribute mora biti :size kilobajtov.',
        'string'  => ':attribute mora biti :size znakov.',
        'array'   => ':attribute mora vsebovati :size elementov.',
    ],
    'string'               => ':attribute mora biti niz.',
    'timezone'             => ':attribute mora biti veljaven časovni pas.',
    'unique'               => ':attribute že obstaja',
    'uploaded'             => ':attribute napaka pri nalaganju.',
    'url'                  => ':attribute format je napačen.',

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
    | following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
