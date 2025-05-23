<!DOCTYPE html>
<html lang="en">

<head>

    @include('home.css')

</head>

<body>

    @include('home.header')


    @foreach ($borrow as $item)
    <div class="item-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec">

                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="left-image">
                        <img src="{{ asset('Book_Images/' . $item->book->book_image) }}"
                            alt="{{$item->book->book_title}}"
                            style="border-radius: 20px; height:auto; width:width: 213px;">
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <h4>{{ $item->book->book_title }}</h4>
                    <span class="author">
                        <h6>Author: {{ $item->book->author_name }}</h6>
                    </span>
                    <p>Status: <strong>{{ ucfirst($item->status) }}</strong></p>
                    <div class="row">
                        <div class="col-3">
                            <span class="bid">
                                Available<br><strong>{{ $item->book->quantity }}</strong><br>
                            </span>
                        </div>
                        <div class="col-3">
                            @if($item->status == 'Applied')
                            <a href="{{ route('cancel_book', $item->id) }}" class="btn btn-danger">Cancel</a>
                            @else
                            <p>Not Allowed</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @include('home.footer')




</body>

</html>