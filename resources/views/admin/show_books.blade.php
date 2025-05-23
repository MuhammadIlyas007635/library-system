<!DOCTYPE html>
<html>
<script>
// Hide alert after 2 seconds (2000 ms)
setTimeout(function() {
    const alertBox = document.getElementById('alert-box');
    if (alertBox) {
        alertBox.style.display = 'none';
    }
}, 3000);
</script>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <!-- Page Header-->
            <div class="page-header no-margin-bottom">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Books </h2>
                </div>
            </div>
            @if(session('success'))
            <div class="alert alert-success" id="alert-box">{{ session('success') }}</div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger" id="alert-box">{{ session('error') }}</div>
            @endif
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Category Form

                    </li>
                </ul>
            </div>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                       
                        


                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="block margin-bottom-sm">
                                        <div class="title"><strong>Books Record</strong></div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Category_Title</th>
                                                        <th>Book_Title</th>
                                                        <th>Author_Name</th>
                                                        <th>Price/Book</th>
                                                        <th>Description</th>
                                                        <th>Quantity</th>
                                                        <th>Book_Image</th>
                                                        <th>Author_Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($books as $index => $book)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $book->category->cat_title }}</td>
                                                        <td>{{ $book->book_title }}</td>
                                                        <td>{{ $book->author_name}}</td>
                                                        <td>{{ $book->price}}</td>
                                                        <td>{{ $book->description}}</td>
                                                        <td>{{ $book->quantity}}</td>
                                                        <td scope="col"><img src="{{ asset('Book_Images/' . $book->book_image) }}" style="height:100px; width:100px;" alt="{{ $book->book_title }}"></td>
                                                        <td scope="col"><img src="{{ asset('Author_Images/' . $book->author_image) }}" style="height:100px; width:100px;"  alt="{{ $book->author_name }}"></td>
                                                        <td>
                                                            <!-- You can add edit/delete buttons here later -->
                                                            <a href="/edit_book/{{ $book->id }}" class="btn btn-sm btn-primary" >Edit</a>
                                                            <a href="/delete_book/{{ $book->id }}"
                                                                class="btn btn-sm btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
        </div>



    </div>
    </div>

    </section>

    @include('admin.footer')

    </div>
    </div>
    <!-- JavaScript files-->

</html>