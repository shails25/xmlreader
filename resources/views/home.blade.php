<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    html,
    body {
    height: 100%;
    background-color: #333;
    }

    body {
    display: -ms-flexbox;
    display: -webkit-box;
    display: flex;
    -ms-flex-pack: center;
    -webkit-box-pack: center;
    justify-content: center;
    color: #fff;
    text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
    box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
    }

    .cover-container {
    max-width: 42em;
    }
    .cover {
    padding: 0 1.5rem;
    }
    .cover .btn-lg {
    padding: .75rem 1.25rem;
    font-weight: 700;
    }


  </style>
</head>
<body>

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">XML Contact Saver</h3>
        </div>
      </header>

      <main role="main" class="inner cover">
        <div class="card">
            <div class="card-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          @if ($error = Session::get('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{$error}}</li>
                </ul>
            </div>
          @endif
                <form action="/upload" method="post" enctype="multipart/form-data">
                @csrf
                    <h3 class="text-muted">Please select XML file to upload contacts</h3>
                    @if(isset($text))
                        <small class="text-small text-muted">{{$text}}</small>
                    @endif
                    <br>
                    <div class="input-group mb-3">
                        <div class="custom-file text-muted">
                            <input type="file" class="custom-file-input" id="inputGroupFile02" accept="text/xml" name="contacts">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>

                        </div>
                    </div>
                    <button class="btn btn-md btn-success" type="submit">Upload</button>
                </form>
                <br>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                    <table class="table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                        </tr>
                    @if($contacts = Session::get("contacts"))
                        @foreach($contacts['contact'] as $cont)
                            <tr>
                                <td>{{$cont['name']}}</td>
                                <td>{{$cont['lastName']}}</td>
                                <td>{{$cont['phone']}}</td>
                            </tr>
                        @endforeach
                    @endif
                    
                    </table>
                
                @endif
            </div>
        </div>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Made By Shailendra</p>
        </div>
      </footer>
    </div>
</body>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</html> 