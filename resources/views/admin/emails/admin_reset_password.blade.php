@component('mail::message')
# Reset Account

Wecome {{$data['data']->name}}

The body of your message.

@component('mail::button', ['url' => aurl('reset/password/'.$data['token'])])

Click Here TO Reset Your Password
@endcomponent
-or-
<br>

Copy This Link

<a href=" {{aurl('reset/password/'.$data['token'])}} "> {{aurl('reset/password/'.$data['token'])}} </a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
