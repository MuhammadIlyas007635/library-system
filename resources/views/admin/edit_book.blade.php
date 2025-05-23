<!DOCTYPE html>
<html>
<script>
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
                    <h2 class="h5 no-margin-bottom">Add Book </h2>
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
                    <li class="breadcrumb-item active">Add Book

                    </li>
                </ul>
            </div>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Basic Form-->
                        <div class="col-lg-6">
                            <div class="block">
                                <div class="title"><strong class="d-block">Add Book</strong><span
                                        class="d-block"></span></div>
                                <div class="block-body">

                                    <form action="{{ url('update_book/' . $book->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                       

                                        <div class="form-group">
                                            <label class="form-control-label">Select Category</label>
                                            <select name="category_id" class="form-control" required>
                                                <option value="">-- Select Category --</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->cat_title }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Book Title</label>
                                            <input type="text" name="book_title" value="{{ $book->book_title }}"
                                                class="form-control" required>
                                            @error('book_title') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Author Name</label>
                                            <input type="text" name="author_name" value="{{ $book->author_name }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Price</label>
                                            <input type="text" name="price" value="{{ $book->price }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Description</label>
                                            <input type="text" name="description" value="{{ $book->description }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Quantity</label>
                                            <input type="text" name="quantity" value="{{ $book->quantity }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Book Image</label>
                                            <input type="file" name="book_image" value="{{ $book->book_image }}" class="form-control">
                                            <input type="hidden" name="previous_book_image" value="{{ $book->book_image }}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Author Image</label>
                                            <input type="file" name="author_image" value="{{ $book->author_image }}" class="form-control">
                                            <input type="hidden" name="previous_author_image" value="{{ $book->author_image }}" class="form-control">
                                        </div>
                                 <input type="hidden" name="id" value="{{ $book->id }}" class="form-control">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Update Book">
                                        </div>
                                    </form>

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