@component('mail::message')
# Thank You for Your Feedback

Hi {{ $feedback->email }},

Thank you for submitting your feedback. We appreciate your input!

Here's a summary of your feedback:
- Subject: {{ $feedback->subject }}
- Contact: {{ $feedback->contact }}
- Message: {{ $feedback->content }}

We will review your feedback and take necessary actions as needed.

Thank you again for taking the time to share your thoughts with us.

Best regards,<br>
{{ config('app.name') }}
@endcomponent
