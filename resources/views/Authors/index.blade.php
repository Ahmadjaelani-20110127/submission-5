<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
    <!-- Tambahkan link Bootstrap CSS di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Data Author</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form name="book-save-form" id="book-save-form" action="{{ url('/authors/save-authors') }}" method="post">
            @csrf
            <div class="form-group row">
                <label for="author-id" class="col-sm-2 col-form-label">Author ID</label>
                <div class="col-sm-10">
                    <input type="text" name="author_id" id="author-id" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="author-name" class="col-sm-2 col-form-label">Author Name</label>
                <div class="col-sm-10">
                    <input type="text" name="author_name" id="author-name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Author ID</th>
                    <th>Author Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($num = 1)
                @foreach ($data as $b)
                    <tr class="row-data">
                        <td>{{ $num++ }}</td>
                        <td>{{ $b['author_id'] }}</td>
                        <td>{{ $b['author_name'] }}</td>
                        <td>
                            <!-- Tambahkan tombol aksi di sini jika diperlukan -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tambahkan script Bootstrap JavaScript di sini -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
