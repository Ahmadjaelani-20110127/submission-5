<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
    <!-- Tambahkan link Bootstrap CSS di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Data Buku</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form name="book-save-form" id="book-save-form" action="{{ url('/books/save-book') }}" method="post">
            @csrf
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" name="id" id="id" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="book-name" class="col-sm-2 col-form-label">Book Name</label>
                <div class="col-sm-10">
                    <input type="text" name="book_name" id="book-name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="author" class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                    <select name="author_id" id="author" class="form-control">
                        <option value="">-- Pilih Author --</option>
                        @foreach ($dataAuthor as $a)
                            <option value="{{ $a['author_id'] }}">{{ $a['author_name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" id="button-reset" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        </form>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Published Date</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($num = 1)
                @foreach ($data as $b)
                    <tr class="row-data">
                        <td>{{ $num++ }}</td>
                        <td>{{ $b['id'] }}</td>
                        <td>{{ $b['book_name'] }}</td>
                        <td>{{ $b['author_name'] }}</td>
                        <td>{{ $b['published_at'] }}</td>
                        <td>
                            <button id="button-edit" class="btn btn-warning"
                                data-id="{{ $b['id'] }}"
                                data-name="{{ $b['book_name'] }}"
                                data-author="{{ $b['author_id'] }}">Edit</button>
                        </td>
                        <td>
                            <form action="{{ url('/books/delete-book?id=') . $b['id'] }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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
    
    <script>
        var button = $('.btn-warning')

        $(document).ready(function() {
            clearForm()
        });

        button.each(function(index) {
            $(this).on('click', function(){
                var id = $(this).data('id')
                var name = $(this).data('name')
                var author = $(this).data('author')

                $('#id').val(id)
                $('#book-name').val(name)
                $('#author').val(author)
            });
        });

        $('#button-reset').on('click', function () {
            clearForm()
        })

        function clearForm(){
            $('#id').val('')
            $('#book-name').val('')
            $('#author').val('')
        }
    </script>
</body>
</html>
