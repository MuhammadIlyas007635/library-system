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
                    <li class="breadcrumb-item active">Borrow

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
                                        <th>User_Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Book_Title</th>
                                        <th>Quantity</th>
                                        <th>Borrow_Status</th>
                                        <th>Book_Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Borrow_request as $index => $borrow)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $borrow->user->name ?? 'N/A' }}</td>
                                        <td>{{ $borrow->user->email ?? 'N/A' }}</td>
                                        <td>{{ $borrow->user->phone ?? 'N/A' }}</td>
                                        <td>{{ $borrow->book->book_title ?? 'N/A' }}</td>
                                        <td>{{ $borrow->book->quantity ?? 'N/A' }}</td>
                                        <td>{{ $borrow->status ?? 'N/A' }}</td>
                                        <td>
                                            @if($borrow->book && $borrow->book->book_image)
                                            <img src="{{ asset('Book_Images/' . $borrow->book->book_image) }}"
                                                alt="Book Image"
                                                style="height: 60px; border-radius: 5px;">
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/approve_book/{{ $borrow->id }}"
                                                class="btn btn-sm btn-primary">Approved</a>
                                            <a href="/rejected_book/{{ $borrow->id }}"
                                                class="btn btn-sm btn-danger">Rejected</a>
                                                <a href="/returned_book/{{ $borrow->id }}"
                                                class="btn btn-sm btn-warning">Returned</a>
                                                
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