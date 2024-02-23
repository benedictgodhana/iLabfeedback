@component('mail::message')
# Feedback Received

Hi Admin,

You have received new feedback:

- **Subject:** {{ $feedback->subject }}
- **Email:** {{ $feedback->email }}
- **Contact:** {{ $feedback->contact }}
- **Message:** {{ $feedback->content }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
