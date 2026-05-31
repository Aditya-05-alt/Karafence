@extends('emails.layout')

@section('title', 'New Inquiry — ' . config('karafence.name'))

@section('content')
    <p style="margin:0 0 8px;font-size:13px;font-weight:bold;color:#D97736;text-transform:uppercase;letter-spacing:1px;">New {{ $inquiry['source_label'] }}</p>
    <h2 style="margin:0 0 20px;font-size:22px;color:#1A2E40;">Someone reached out via the website</h2>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border:1px solid #e2e8f0;border-radius:8px;overflow:hidden;margin-bottom:24px;">
        <tr>
            <td style="padding:12px 16px;background-color:#f8fafc;font-size:13px;font-weight:bold;color:#64748b;width:140px;border-bottom:1px solid #e2e8f0;">Name</td>
            <td style="padding:12px 16px;font-size:15px;color:#1A2E40;border-bottom:1px solid #e2e8f0;">{{ $inquiry['first_name'] }} {{ $inquiry['last_name'] }}</td>
        </tr>
        <tr>
            <td style="padding:12px 16px;background-color:#f8fafc;font-size:13px;font-weight:bold;color:#64748b;border-bottom:1px solid #e2e8f0;">Email</td>
            <td style="padding:12px 16px;font-size:15px;border-bottom:1px solid #e2e8f0;">
                <a href="mailto:{{ $inquiry['email'] }}" style="color:#D97736;text-decoration:none;">{{ $inquiry['email'] }}</a>
            </td>
        </tr>
        @if(!empty($inquiry['program']))
        <tr>
            <td style="padding:12px 16px;background-color:#f8fafc;font-size:13px;font-weight:bold;color:#64748b;border-bottom:1px solid #e2e8f0;">Program</td>
            <td style="padding:12px 16px;font-size:15px;color:#1A2E40;border-bottom:1px solid #e2e8f0;">{{ $inquiry['program'] }}</td>
        </tr>
        @endif
        <tr>
            <td style="padding:12px 16px;background-color:#f8fafc;font-size:13px;font-weight:bold;color:#64748b;border-bottom:1px solid #e2e8f0;">Form</td>
            <td style="padding:12px 16px;font-size:15px;color:#1A2E40;border-bottom:1px solid #e2e8f0;">{{ $inquiry['source_label'] }}</td>
        </tr>
        @if(!empty($inquiry['message']))
        <tr>
            <td style="padding:12px 16px;background-color:#f8fafc;font-size:13px;font-weight:bold;color:#64748b;vertical-align:top;">Message</td>
            <td style="padding:12px 16px;font-size:15px;color:#1A2E40;line-height:1.6;white-space:pre-wrap;">{{ $inquiry['message'] }}</td>
        </tr>
        @endif
    </table>

    <p style="margin:0;font-size:13px;color:#64748b;">Submitted on {{ $inquiry['submitted_at'] }}</p>
@endsection
