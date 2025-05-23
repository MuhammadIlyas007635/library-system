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
                    <h2 class="h5 no-margin-bottom">Edit Category </h2>
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
                    <li class="breadcrumb-item active">Edit Category Form

                    </li>
                </ul>
            </div>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Basic Form-->
                        <div class="col-lg-6">
                            <div class="block">
                                <div class="title"><strong class="d-block">Edit Category Form</strong><span
                                        class="d-block"></span></div>
                                <div class="block-body">

                                    <form action="{{ url('/update/' . $category->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-control-label">Category Title</label>
                                             <input type="hidden" 
                                                value="{{$category->id}}" name="id" class="form-control"
                                                >
                                            <input type="text" placeholder="category title"
                                                value="{{$category->cat_title}}" name="cat_title" class="form-control"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary">
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