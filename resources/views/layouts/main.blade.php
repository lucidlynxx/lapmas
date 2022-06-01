<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta
      name="author"
      content="Mark Otto, Jacob Thornton, and Bootstrap contributors"
    />
    <meta name="generator" content="Hugo 0.88.1" />
    <title>LAPMAS | {{ $title }}</title>

    <!-- Icons Bootstrap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
    />

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/cover.css">
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body class="d-flex h-100 text-center text-white">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        @include('partials.navbar')

        @yield('container')

        @include('partials.footer')

        <!-- Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Ready to Leave?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-dark">
                Select "Logout" below if you are ready to end your current session.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cancel</button>
                <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="text-dark">
      @include('sweetalert::alert')
    </div>
    
  </body>
</html>
