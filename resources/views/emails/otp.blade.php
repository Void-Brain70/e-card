<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Verification Code</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f8fafc; color: #1e293b; }
        .wrapper { max-width: 560px; margin: 40px auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #10b981 0%, #0d9488 50%, #0891b2 100%); padding: 40px 40px 32px; text-align: center; }
        .header-icon { width: 56px; height: 56px; background: rgba(255,255,255,0.2); border-radius: 14px; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 16px; }
        .header h1 { color: white; font-size: 22px; font-weight: 700; letter-spacing: -0.3px; }
        .header p { color: rgba(255,255,255,0.85); font-size: 14px; margin-top: 6px; }
        .body { padding: 40px; }
        .greeting { font-size: 16px; color: #475569; margin-bottom: 20px; }
        .greeting strong { color: #1e293b; }
        .otp-container { background: linear-gradient(135deg, #f0fdf4, #f0fdfa); border: 2px dashed #6ee7b7; border-radius: 12px; padding: 28px; text-align: center; margin: 24px 0; }
        .otp-label { font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; color: #0d9488; margin-bottom: 12px; }
        .otp-code { font-size: 42px; font-weight: 800; letter-spacing: 10px; color: #059669; font-family: 'Courier New', monospace; }
        .expiry { font-size: 13px; color: #94a3b8; margin-top: 12px; }
        .divider { height: 1px; background: #f1f5f9; margin: 28px 0; }
        .message { font-size: 14px; color: #64748b; line-height: 1.7; }
        .warning { background: #fef9c3; border-left: 4px solid #facc15; padding: 14px 16px; border-radius: 0 8px 8px 0; font-size: 13px; color: #854d0e; margin-top: 20px; }
        .footer { background: #f8fafc; padding: 24px 40px; text-align: center; border-top: 1px solid #f1f5f9; }
        .footer p { font-size: 12px; color: #94a3b8; line-height: 1.6; }
        .footer a { color: #059669; text-decoration: none; }
        .brand { font-weight: 700; color: #059669; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="header-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22 6L12 13L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h1>Verify Your Email</h1>
            <p>E-Card Platform — Email Verification</p>
        </div>

        <div class="body">
            <p class="greeting">Hello, <strong>{{ $userName }}</strong>!</p>
            <p class="message">
                Welcome to E-Card! To complete your registration and start sending beautiful digital cards,
                please use the verification code below.
            </p>

            <div class="otp-container">
                <div class="otp-label">Your Verification Code</div>
                <div class="otp-code">{{ $otp }}</div>
                <div class="expiry">⏱ Expires in 10 minutes</div>
            </div>

            <div class="divider"></div>

            <p class="message">
                Enter this 6-digit code on the verification page to confirm your email address and activate your account.
            </p>

            <div class="warning">
                <strong>Security Notice:</strong> Never share this code with anyone. E-Card will never ask for your OTP via phone or email.
            </div>
        </div>

        <div class="footer">
            <p>
                This email was sent by <a href="#" class="brand">E-Card</a>.<br>
                If you didn't create an account, you can safely ignore this email.<br>
                <a href="#">Unsubscribe</a> &middot; <a href="#">Privacy Policy</a>
            </p>
        </div>
    </div>
</body>
</html>
