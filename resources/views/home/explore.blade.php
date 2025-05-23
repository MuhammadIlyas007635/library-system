<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    @include('home.css')

  </head>

<body>

  @include('home.header')
<div class="discover-items">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading">

                    <h2>Discover Some Of Our <em>Items</em>.</h2>
                </div>
            </div>
            <div class="col-lg-7">
                <form id="search-form" method="GET" action="{{ route('search-book') }}">
                    <div class="row">
                        <div class="col-lg-4">
                            <fieldset>
                                <input type="text" name="search" class="searchText" placeholder="Type Something..."
                                    autocomplete="on" required>
                            </fieldset>
                        </div>
    <form method="GET" id="categoryForm">
    <div class="col-lg-3">
        <fieldset>
            <select name="category" class="form-select" id="chooseCategory" onchange="submitCategory()">
                <option value="All" {{ request()->is('search-category') ? 'selected' : '' }}>All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request()->is('search-category/'.$cat->id) ? 'selected' : '' }}>
                        {{ $cat->cat_title }}
                    </option>
                @endforeach
            </select>
        </fieldset>
    </div>
</form>

                      
                        <div class="col-lg-2">
                            <fieldset>
                                <button class="main-button">Search</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>

            <div class="currently-market">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <div class="line-dec"></div>
                                <h2><em>Items</em> Currently In The Market.</h2>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="filters">
                                <ul>
                                    <li> <a href="{{url('/explore')}}" class="active btn btn-primary"> All Books</a></li>

                                </ul>
                            </div>
                        </div>

                        @foreach($books as $book)
                        <div class="col-lg-6 currently-market-item all msc">
                            <div class="item">
                                <div class="left-image">
                                    <img src="{{ asset('Book_Images/' . $book->book_image) }}" alt=""
                                        style="border-radius: 20px; width: 250px !important; height: 312px !important; margin-top: 5px;">
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
                                        <a href="#">View Item Details</a>
                                    </div>

                                    <div class="text-button">
                                        <a href="{{ url('borrow_book/' . $book->id) }}"
                                            class="btn btn-primary mt-2 text-white">Borrow</a>
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
</div>
@include('home.footer')


  </body>
</html>


<script>
    function submitCategory() {
        var categoryId = document.getElementById('chooseCategory').value;
        
        if (categoryId === 'All') {
            window.location.href = "{{ url('/search-category') }}";
        } else {
            window.location.href = "{{ url('/search-category') }}/" + categoryId;
        }
    }
</script>