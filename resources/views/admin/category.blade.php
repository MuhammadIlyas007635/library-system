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
                    <h2 class="h5 no-margin-bottom">Category </h2>
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
                        <!-- Basic Form-->
                        <div class="col-lg-6">
                            <div class="block">
                                <div class="title"><strong class="d-block">Category Form</strong><span
                                        class="d-block"></span></div>
                                <div class="block-body">

                                    <form action="{{ url('/addcategory') }}" method="POST">
                                        @csrf



                                        <div class="form-group">
                                            <label class="form-control-label">Category Title</label>
                                            <input type="text" placeholder="category title" name="cat_title"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="block margin-bottom-sm">
                                        <div class="title"><strong>Category Record</strong></div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Category_Title</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($category as $index => $cat)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $cat->cat_title }}</td>
                                                        <td>
                                                            <!-- You can add edit/delete buttons here later -->
                                                            <a href="/editcategory/{{ $cat->id }}" class="btn btn-sm btn-primary">Edit</a>
                                                            <a href="/deletecategory/{{ $cat->id }}"
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