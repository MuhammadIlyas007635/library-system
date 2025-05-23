<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.css')

</head>

<body>

    @include('home.header')
    <div class="item-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h2>View Details <em>Of a Book</em> Here.</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="left-image">
                        <img src="{{ asset('Book_Images/' . $data->book_image) }}"
                            style="border-radius: 20px;width:50%;">
                    </div>
                </div>
                <div class="col-lg-5 align-self-center">
                    <h4>{{$data->book_title}}</h4>
                    <span class="author">

                        <h6>{{$data->author_name}}</h6>
                    </span>
                    <p>{{$data->description}}</p>
                    <div class="row">
                        <div class="col-3">
                            <span class="bid">
                                Available<br><strong>{{$data->quantity}}</strong><br>
                            </span>
                        </div>
                        
                    </div>
                </div>
                <div class="text-button">
                    <a href="{{ url('borrow_book/' . $data->id) }}" class="btn btn-primary mt-2 text-white">Borrow</a>
                </div>

            </div>
        </div>
    </div>
    @include('home.footer')


</body>

</html>