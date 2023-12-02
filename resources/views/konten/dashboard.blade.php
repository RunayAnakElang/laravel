@extends('layouts.app')

@section('content')
<div class="container">

    <a href="/createcategory" class="btn btn-success">create category</a>
    <a href="/createquestion" class="btn btn-danger">create question</a>
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              @foreach ($question as $b)
              <tr>

                  <td>{!! $b->question !!}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
</div>
@endsection
