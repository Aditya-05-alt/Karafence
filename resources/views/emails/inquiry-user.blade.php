@extends('emails.layout')

@section('title', 'Welcome to ' . config('karafence.name'))

@section('content')
    <p style="margin:0 0 8px;font-size:13px;font-weight:bold;color:#D97736;text-transform:uppercase;letter-spacing:1px;">Thank You</p>
    <h2 style="margin:0 0 16px;font-size:24px;color:#1A2E40;">Welcome to {{ config('karafence.name') }}!</h2>

    <p style="margin:0 0 16px;font-size:16px;line-height:1.7;color:#334155;">
        Hello <strong>{{ $inquiry['first_name'] }}</strong>,
    </p>

    <p style="margin:0 0 16px;font-size:16px;line-height:1.7;color:#334155;">
        Thank you for reaching out to us. We have received your {{ strtolower($inquiry['source_label']) }} and our designated team member will contact you shortly.
    </p>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color:#FFF7ED;border-left:4px solid #D97736;border-radius:8px;margin:24px 0;">
        <tr>
            <td style="padding:20px 24px;">
                <p style="margin:0;font-size:15px;line-height:1.7;color:#1A2E40;">
                    At {{ config('karafence.name') }}, we are committed to helping you begin your martial arts journey with confidence, discipline, and strength.
                </p>
            </td>
        </tr>
    </table>

    <p style="margin:0 0 8px;font-size:15px;line-height:1.7;color:#334155;">
        If you have any urgent questions, feel free to reply to this email.
    </p>

    <p style="margin:24px 0 0;font-size:15px;line-height:1.7;color:#334155;">
        With respect,<br>
        <strong style="color:#1A2E40;">The {{ config('karafence.name') }} Team</strong>
    </p>
@endsection
