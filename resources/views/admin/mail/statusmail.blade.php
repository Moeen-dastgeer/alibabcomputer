<x-mail::message>
# Hi {{$email_data['name']}}  
   

Your Order status is {{$email_data['status']}}.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
