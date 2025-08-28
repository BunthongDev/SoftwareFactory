<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AnajakSoftware Dashboard</title>
        
        {{-- 1. Favicon link added --}}
        <link rel="icon" href="{{ asset('backend/assets/images/SoftwareFactory-Favicon.png') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Inter', sans-serif;
                background-color: #111827; /* Dark background */
                background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.05) 1px, transparent 0);
                background-size: 20px 20px;
                color: #ffffff;
                overflow: hidden; /* Hide scrollbars */
            }
            .welcome-card {
                background-color: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.1);
                animation: fadeInUp 0.8s ease-out forwards;
                opacity: 0;
            }
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(30px) scale(0.98); }
                to { opacity: 1; transform: translateY(0) scale(1); }
            }
            .logo-interactive {
                transition: transform 0.3s ease;
            }
            .logo-interactive:hover {
                transform: scale(1.1);
            }
            .btn-gradient {
                background: linear-gradient(45deg, #3b82f6, #8b5cf6);
                border: none;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            }
            .btn-gradient:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="d-flex flex-column justify-content-center align-items-center vh-100 p-5">
            
            <div class="card shadow-lg p-5 p-sm-6 rounded-4 welcome-card" style="max-width: 500px;">
                <div class="card-body text-center p-10">
                    
                    {{-- 2. Logo path corrected to match your folder structure --}}
                    <img src="{{ asset('backend/assets/images/SoftwareFactory-Favicon.png') }}" alt="AnajakSoftware Logo" class="mb-4 mx-auto logo-interactive" style="height: 5rem;">
                    
                    <h1 class="display-6 fw-bold text-white p-3">AnajakSoftware</h1>
                    
                    <p class="lead text-white-50 mb-4">Backend Management Dashboard</p>
                    
                    <div class="d-grid gap-2">
                        <a href="{{ route('login') }}" class="btn btn-gradient text-white btn-lg fw-bold">Login to Dashboard</a>
                    </div>
                </div>
            </div>

            <footer class="position-absolute bottom-0 text-white-50 p-3">
                <p>&copy; {{ date('Y') }} AnajakSoftware. All Rights Reserved.</p>
            </footer>
        </div>
    </body>
</html>