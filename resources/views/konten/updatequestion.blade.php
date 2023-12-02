
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- CKEditor CDN --}}
    <script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
<div class="container">
    <form method="POST" action="/createquestion">
        @csrf
        <div class="mb-3">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">textarea</label>
                <textarea class="form-control" name="question" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            <select class="form-select form-select-sm" id="kategori_dropdown" name="kategori" aria-label="Small select example">
                <option selected>{{ $question }}</option>
                @foreach ( $kategori as $b )
                <option value="{{ $b->id }}">{{ $b->nama_kategori }}</option>
                @endforeach
              </select>
          <textarea id="post_text" name="post_text" class="post-area"></textarea>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

<script>
    CKEDITOR.replace('post_text', {
        filebrowserUploadUrl: "{{ route('reiki', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });

</script>
<script>
    $(document).ready(function() {

        $('form').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = {
                // ambil dropdown
                kategori: $("#kategori_dropdown").find(":selected").val(),
                question: $('#post_text').val(),
                _token: "{{ csrf_token() }}"
            };

            $.ajax({
                url: "{{ route('storequestion') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle the successful response
                    // console.log(response);
                    alert("Pertanyaan berhasil disimpan")
                    // You can perform additional actions here, such as displaying a success message or refreshing the page.
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.log(xhr.responseText);
                    // You can display an error message or perform any necessary actions in case of an error.
                }
            });
        });
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  </body>
</html>
