@component('mail::message')
# Introduction

Novo produto criado!

@component('mail::button', ['url' => ''])
Confirmar
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent