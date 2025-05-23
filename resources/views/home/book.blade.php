  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<script>
// Hide alert after 2 seconds (2000 ms)
setTimeout(function() {
    const alertBox = document.getElementById('alert-box');
    if (alertBox) {
        alertBox.style.display = 'none';
    }
}, 5000);
</script>
  
  
  <div class="currently-market">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h2><em>Items</em> Currently In The Market.</h2>
                </div>
            </div>
           

 @if(session('message'))
            <div class="alert alert-success" id="alert-box">{{ session('message') }}</div>
            @endif

            <div class="col-lg-12">
                <div class="row grid">

                    @foreach($books as $book)
                    <div class="col-lg-6 currently-market-item all msc">
                        <div class="item">
                            <div class="left-image">
                                <img src="{{ asset('Book_Images/' . $book->book_image) }}" alt=""
                                    style="border-radius: 20px; width: 250px !important; height: 312px ; !important; ">
                            </div>
                            <div class="right-content text-white">
                                <h4>{{ $book->book_title }}</h4>
                                <span class="author ">


                                    <h6>Author: {{$book->author_name }}</h6>
                                </span>
                                <div class="line-dec"></div>
                                <span class="bid">
                                    Current Available<br><strong>{{ $book->quantity }}</strong><br>
                                </span>

                                <div class="text-button">
                                    <a href="{{ url('show_detail/' . $book->id) }}">View Item Details</a>
                                </div>

                                <div class="text-button">
                                    <a href="{{ url('borrow_book/' . $book->id) }}" class="btn btn-primary mt-2 text-white">Borrow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>