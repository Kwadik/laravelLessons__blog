@component('mail::message')
# Introduction

Ваш пароль: {{ $password }}

@component('mail::button', ['url' => 'https://yandex.ru'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
