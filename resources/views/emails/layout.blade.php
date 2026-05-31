<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('karafence.name'))</title>
</head>
<body style="margin:0;padding:0;background-color:#FDF6E3;font-family:Arial,Helvetica,sans-serif;color:#1A2E40;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color:#FDF6E3;padding:24px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="max-width:600px;width:100%;background-color:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 4px 24px rgba(26,46,64,0.12);">
                    <tr>
                        <td style="background-color:#1A2E40;padding:28px 32px;text-align:center;border-bottom:4px solid #D97736;">
                            <p style="margin:0 0 6px;font-size:12px;letter-spacing:3px;text-transform:uppercase;color:#D97736;font-weight:bold;">Martial Arts Dojo</p>
                            <h1 style="margin:0;font-size:28px;line-height:1.2;color:#ffffff;font-weight:bold;">{{ config('karafence.name') }}</h1>
                            <p style="margin:8px 0 0;font-size:14px;color:#cbd5e1;">鎭 力 道</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            @yield('content')
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color:#1A2E40;padding:24px 32px;text-align:center;">
                            <p style="margin:0 0 8px;font-size:14px;color:#ffffff;font-weight:bold;">{{ config('karafence.name') }}</p>
                            <p style="margin:0;font-size:12px;color:#94a3b8;line-height:1.6;">
                                Dedicated to discipline, strength, and self-defense.<br>
                                @if(config('karafence.website'))
                                    <a href="{{ config('karafence.website') }}" style="color:#D97736;text-decoration:none;">Visit our website</a>
                                @endif
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
