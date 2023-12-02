<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
    <form method="POST" action="/createcategory">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Category</label>
          <input type="text" name="nama_kategori" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

<br>
<br>
<h1>data kategori</h1>
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kategori</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $kategori as $b )
          <tr>
            <th scope="row">1</th>
            <td>{{ $b->nama_kategori }}</td>
            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                edit
              </button></td>
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/updatecategory/{{ $b->id}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="container">
                            <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" id="exampleInputEmail1" value="{{ $b->nama_kategori }}" aria-describedby="emailHelp">
                          </div>
                          <button type="submit" class="btn btn-primary mt-3">Submit</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <td><form action="/categorydelete/{{ $b->id }}" method="POST">
                @csrf
               @method('delete')
                <input type="submit" name="delete" value="Delete" class="btn btn-danger" id="delete">
                </form></td>
          </tr>
          @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
