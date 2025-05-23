<div class="categories-collections">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="categories">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <div class="line-dec"></div>
                <h2>Browse Book By <em>Categories</em> Here.</h2>
              </div>
            </div>

            @foreach($categories as $category)  
            <div class="col-lg-2 col-sm-6">
              <a href="{{ url('/category-by-book/' . $category->id) }}" class="btn btn-primary"> 
                <div class="item">
                  
                  <h4>{{ $category->cat_title }}</h4>
                </div>
              </a>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
