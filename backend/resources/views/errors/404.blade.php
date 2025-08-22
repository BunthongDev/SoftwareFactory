<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Not Found</title>
    <link rel="icon" type="image/png" href="{{ asset('backend/assets/images/SoftwareFactory-Favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>

   <style>
    .float-animation {
        animation: float 4s ease-in-out infinite;
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-20px);
        }
        100% {
            transform: translateY(0px);
        }
    }
</style>

<div class="content">
    <div class="container-xxl">
        {{-- This container will vertically center the content --}}
        <div class="d-flex align-items-center justify-content-center" style="min-height: 70vh;">

            <div class="row align-items-center">
                {{-- Image Column --}}
                <div class="col-md-6 text-center">
                    <img src="{{ asset('backend/assets/images/404-error.svg') }}"
                         alt="Page Not Found"
                         class="img-fluid float-animation"
                         style="max-width: 400px;">
                </div>

                {{-- Text Column --}}
                <div class="col-md-6 text-center text-md-start mt-4 mt-md-0">
                    <h1 class="display-3 fw-bold text-primary">៤០៤</h1>
                    <p class="fs-4 fw-semibold">Oops! Page Not Found</p>
                    <p class="text-muted">
                        Sorry, the page you are looking for does not exist. It might have been moved or deleted.
                    </p>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">
                        <i class="fa-solid fa-house me-1"></i> Go Back to Dashboard
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
