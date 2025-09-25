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

    'accepted' => ':attributeを承認してください。',
    'active_url' => ':attributeは、有効なURLではありません。',
    'after' => ':attributeには、:dateより後の日付を指定してください。',
    'after_or_equal' => ':attributeには、:date以降の日付を指定してください。',
    'alpha' => ':attributeは、アルファベットのみで構成してください。',
    'alpha_dash' => ':attributeは、英数字とハイフン、アンダースコアのみで構成してください。',
    'alpha_num' => ':attributeは、英数字のみで構成してください。',
    'array' => ':attributeには、配列を指定してください。',
    'before' => ':attributeには、:dateより前の日付を指定してください。',
    'before_or_equal' => ':attributeには、:date以前の日付を指定してください。',
    'between' => [
        'numeric' => ':attributeは、:minから:maxまでの範囲で指定してください。',
        'file' => ':attributeは、:min KBから:max KBまでのファイルを指定してください。',
        'string' => ':attributeは、:min文字から:max文字までの範囲で指定してください。',
        'array' => ':attributeの項目は、:min個から:max個までで指定してください。',
    ],
    'boolean' => ':attributeには、trueかfalseを指定してください。',
    'confirmed' => ':attributeと、確認フィールドとが一致しません。',
    'date' => ':attributeは、有効な日付ではありません。',
    'date_equals' => ':attributeは、:dateと等しい日付を指定してください。',
    'date_format' => ':attributeは、":format"形式と一致していません。',
    'different' => ':attributeと:otherには、異なる値を指定してください。',
    'digits' => ':attributeは、:digits桁で指定してください。',
    'digits_between' => ':attributeは、:min桁から:max桁までの範囲で指定してください。',
    'dimensions' => ':attributeの画像サイズが不正です。',
    'distinct' => ':attributeに重複した値があります。',
    'email' => ':attributeには、有効なメールアドレス形式を指定してください。',
    'ends_with' => ':attributeの末尾には、次のいずれかを指定してください。:values',
    'exists' => '選択された:attributeは、有効ではありません。',
    'file' => ':attributeには、ファイル形式を指定してください。',
    'filled' => ':attributeは必須です。',
    'gt' => [
        'numeric' => ':attributeには、:valueより大きな値を指定してください。',
        'file' => ':attributeには、:value KBより大きなファイルを指定してください。',
        'string' => ':attributeは、:value文字より長く指定してください。',
        'array' => ':attributeの項目は、:value個より多く指定してください。',
    ],
    'gte' => [
        'numeric' => ':attributeには、:value以上の値を指定してください。',
        'file' => ':attributeには、:value KB以上のファイルを指定してください。',
        'string' => ':attributeは、:value文字以上で指定してください。',
        'array' => ':attributeの項目は、:value個以上で指定してください。',
    ],
    'image' => ':attributeには、画像を指定してください。',
    'in' => '選択された:attributeは、有効ではありません。',
    'in_array' => ':attributeが:otherに存在しません。',
    'integer' => ':attributeには、整数を指定してください。',
    'ip' => ':attributeには、有効なIPアドレスを指定してください。',
    'ipv4' => ':attributeには、有効なIPv4アドレスを指定してください。',
    'ipv6' => ':attributeには、有効なIPv6アドレスを指定してください。',
    'json' => ':attributeには、有効なJSON文字列を指定してください。',
    'lt' => [
        'numeric' => ':attributeには、:valueより小さな値を指定してください。',
        'file' => ':attributeには、:value KBより小さなファイルを指定してください。',
        'string' => ':attributeは、:value文字より短く指定してください。',
        'array' => ':attributeの項目は、:value個より少なく指定してください。',
    ],
    'lte' => [
        'numeric' => ':attributeには、:value以下の値を指定してください。',
        'file' => ':attributeには、:value KB以下のファイルを指定してください。',
        'string' => ':attributeは、:value文字以下で指定してください。',
        'array' => ':attributeの項目は、:value個以下で指定してください。',
    ],
    'max' => [
        'numeric' => ':attributeには、:max以下の値を指定してください。',
        'file' => ':attributeには、:max KB以下のファイルを指定してください。',
        'string' => ':attributeは、:max文字以下で指定してください。',
        'array' => ':attributeの項目は、:max個以下で指定してください。',
    ],
    'mimes' => ':attributeには、:valuesタイプのファイルを指定してください。',
    'mimetypes' => ':attributeには、:valuesタイプのファイルを指定してください。',
    'min' => [
        'numeric' => ':attributeには、:min以上の値を指定してください。',
        'file' => ':attributeには、:min KB以上のファイルを指定してください。',
        'string' => ':attributeは、:min文字以上で指定してください。',
        'array' => ':attributeの項目は、:min個以上で指定してください。',
    ],
    'not_in' => '選択された:attributeは、有効ではありません。',
    'not_regex' => ':attributeの形式が不正です。',
    'numeric' => ':attributeには、数字を指定してください。',
    'password' => 'パスワードが間違っています。',
    'present' => ':attributeが存在している必要があります。',
    'regex' => ':attributeには、有効な形式を指定してください。',
    'required' => ':attributeは、必ず指定してください。',
    'required_if' => ':otherが:valueの場合、:attributeを指定してください。',
    'required_unless' => ':otherが:values以外の場合、:attributeを指定してください。',
    'required_with' => ':valuesを指定する場合は、:attributeも指定してください。',
    'required_with_all' => ':valuesを指定する場合は、:attributeも指定してください。',
    'required_without' => ':valuesを指定しない場合は、:attributeを指定してください。',
    'required_without_all' => ':valuesのいずれかを指定する場合は、:attributeを指定してください。',
    'same' => ':attributeと:otherには、同じ値を指定してください。',
    'size' => [
        'numeric' => ':attributeには、:sizeを指定してください。',
        'file' => ':attributeには、:size KBのファイルを指定してください。',
        'string' => ':attributeは、:size文字で指定してください。',
        'array' => ':attributeの項目は、:size個を指定してください。',
    ],
    'starts_with' => ':attributeの先頭には、次のいずれかを指定してください。:values',
    'string' => ':attributeには、文字列を指定してください。',
    'timezone' => ':attributeには、有効なタイムゾーンを指定してください。',
    'unique' => '指定の:attributeは、すでに存在しています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => ':attributeは、有効なURL形式で指定してください。',
    'uuid' => ':attributeは、有効なUUIDでなければなりません。',

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
        'name' => [
            'required' => '商品名を入力してください',
        ],
        'price' => [
            'required' => '値段を入力してください',
            'numeric' => '数値で入力してください',
            'min' => '0-10000円以内で入力してください',
            'max' => '0-10000円以内で入力してください',
        ],
        'image' => [
            'required' => '商品画像を登録してください',
            'image' => '画像を選択してください',
            'mimes' => '「png」または「jpeg」形式でアップロードしてください',
        ],
        'season' => [
            'required' => '季節を選択してください',
        ],
        'description' => [
            'required' => '商品説明を入力してください',
            'max' => '120文字以内で入力してください',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'product_name' => '商品名',
        'product_price' => '値段',
        'product_image' => '商品画像',
        'product_season' => '季節',
        'product_description' => '商品説明',
    ],

];