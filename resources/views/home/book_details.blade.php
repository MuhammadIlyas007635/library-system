<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    @include('home.css')

  </head>

<body>

  @include('home.header')

<<div class="item-details-page">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading">
          <div class="line-dec"></div>
          <h2>View Details <em>For All Items</em> Here.</h2>
        </div>
      </div>

      @foreach($books as $book)
      <div class="col-lg-6 mb-4">
        <div class="row">
          <div class="col-lg-5">
            <div class="left-image">
              <img src="{{ asset('Book_Images/' . $book->book_image) }}" alt="" style="border-radius: 20px;width:43%;">
            </div>
          </div>
          <div class="col-lg-7 align-self-center">
            <h4>{{ $book->book_title }}</h4>
            <p>{{ $book->description }}</p>
            <div class="row">
              <div class="col-6">
                <span class="bid">
                  Available<br><strong>{{ $book->quantity }}</strong><br>
                </span>
              </div>
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
  
  
@include('home.footer')

  <!-- ***** Main Banner Area Start ***** -->
  
  <!-- ***** Main Banner Area End ***** -->
  
  

  

  

  

  </body>
</html>