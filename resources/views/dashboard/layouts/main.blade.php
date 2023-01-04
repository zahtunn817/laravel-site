<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>HiRenJi Blog | Dashboard</title>

        <script src="https://unpkg.com/feather-icons"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{{asset('dashboard.css')}}" />

        <!-- Trix Editor -->
        {{-- <link rel="stylesheet" type="text/css" href="trix.css">
        <script type="text/javascript" src="trix.js"></script> --}}

      
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">


        
    </head>
    <body>
        @include("dashboard.layouts.header")
        <div class="container-fluid">
            <div class="row">
                @include("dashboard.layouts.sidebar")

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

        <script src="dashboard.js"></script>

        <script>
            feather.replace()
        </script>
    </body>
</html>
