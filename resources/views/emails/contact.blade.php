<x-mail::message>
# Hello, you have got an enquiry!

<h3>Name : {{ $data['name'] }}</h3>
<h3>Email : {{ $data['email'] }}</h3>
<h3>Message : {{ $data['message'] }}</h3>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
