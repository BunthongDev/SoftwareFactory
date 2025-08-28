<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Verification Code</title>
</head>

<body style="font-family: Arial, Helvetica, sans-serif; background-color: #f8f9fa; margin:0; padding:0;">
    <div style="width:100%; padding: 24px 0;">
        <div
            style="max-width:500px; margin:40px auto; background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.04); overflow:hidden;">
            <!-- Logo -->
            <div style="text-align:center; margin-top:32px; margin-bottom:24px;">
                <h1>AnajakSoftware</h1>
                {{-- <img src="{{ config('app.url') }}/backend/assets/images/logo-light-mode.png" alt="Company Logo"
                    style="height:40px;"> --}}
            </div>
            <!-- Card Header -->
            <div style="background:#0d6efd; color:#fff; text-align:center; padding:24px;">
                <h2 style="margin:0; font-size:1.5rem; font-weight:bold;">Login Verification</h2>
            </div>
            <!-- Card Body -->
            <div style="padding:32px 24px;">
                <h4 style="color:#6c757d; text-align:center; margin-bottom:24px; font-size:1rem;">
                    Your verification code is below — enter it in your browser to complete your login.
                </h4>
                <div style="text-align:center; margin:32px 0;">
                    <span
                        style="display:inline-block; background:#f1f3f5; color:#0d6efd; font-weight:bold; font-size:2rem; border-radius:8px; padding:16px 32px; letter-spacing:0.25rem;">
                        {{ $code }}
                    </span>
                </div>
                <div style="text-align:center; color:#6c757d; font-size:0.95rem;">
                    <p style="margin-bottom:8px;">This code is valid for a limited time.</p>
                    <p style="margin:0;">If you did not request this, you can safely ignore this email.</p>
                </div>
            </div>
            <!-- Footer -->
            <div style="text-align:center; margin:24px 0 8px 0;">
                <p style="color:#adb5bd; font-size:0.8rem;">© 2025 AnajakSoftware. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>

</html>
