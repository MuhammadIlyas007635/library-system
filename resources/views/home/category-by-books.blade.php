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
            <h2>View Details <em>Of Books</em> Here.</h2>
          </div>
        </div>
         @forelse($books as $book)
        <div class="col-lg-7">
          <div class="left-image">
             <img src="{{ asset('Book_Images/' . $book->book_image) }}" alt="" style="border-radius: 20px;width:43%; margin-top: 51px;">
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <h4>The Greatest Book</h4>
          <span class="author">
            
            <h6>{{$book->book_title}}</h6>
          </span>
          <p>{{$book->description}}</p>
          <div class="row">
            <div class="col-3">
              <span class="bid">
                Available<br><strong>{{$book->quantity}}</strong><br>
              </span>
            </div>
            
            <div class="col-5">
              <span class="ends">
                Total Quantity<br><strong>20</strong><br>
              </span>
            </div>
          </div>
          <div class="text-button">
                    <a href="{{ url('borrow_book/' . $book->id) }}" class="btn btn-primary mt-2 text-white">Borrow</a>
                </div>
        </div>

        @empty
            <p>No books found in this category.</p>
        @endforelse
        
  </div>
    </div>
      </div>

<!-- <div class="container mb-12">
     <div class="item-details-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>View Details <em>For Item</em> Here.</h2>
          </div>
        </div>
        @forelse($books as $book)
        <div class="col-lg-7">
          <div class="left-image">
            
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <h4>{{$book->book_titl}}</h4>
          <span class="author">
            <img src="assets/images/author-02.jpg" alt="" style="max-width: 300px; border-radius: 50%;">
            <h6>Liberty Artist</h6>
          </span>
</div>
          <p>Lorem ipsum dolor sit amet, consectetu dipiscingei elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <div class="row">
            <div class="col-3">
              <span class="bid">
                Available<br><strong>10</strong><br>
              </span>
            </div>
            
            <div class="col-5">
              <span class="ends">
                Total Quantity<br><strong>20</strong><br>
              </span>
            </div>
          </div>
          
        </div>
         @empty
            <p>No books found in this category.</p>
        @endforelse
        
  </div>
    </div>
      </div>
</div>
</div>
      </div>
</div> -->







    
    

@include('home.footer')

  <!-- ***** Main Banner Area Start ***** -->
  
  <!-- ***** Main Banner Area End ***** -->
  
  

  

  

  

  </body>
</html>