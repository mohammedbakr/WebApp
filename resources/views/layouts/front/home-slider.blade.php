<section id="hero" class="hero-section top-area">
  <div class="container">
    <div id="Category" class="row dropd text-center">
      <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
        <div class="dropdown">
          <button class="dropbtn">{{trans('main.sidebarfront.Category')}} <i class="fa fa-chevron-down"></i></button>
          <div class="dropdown-content">
                <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
                <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
                <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
                <a href="#">{{trans('main.sidebarfront.Category')}} 4</a>
            {{-- <div class="row">
              <div class="col-lg-3 col-md-3">
                <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
                <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
                <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
              </div>
              <div class="col-lg-3 col-md-3">
                <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
                <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
                <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
              </div>
              <div class="col-lg-3 col-md-3">
                <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
                <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
                <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
              </div>
              <div class="col-lg-3 col-md-3">
                <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
                <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
                <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
        <div class="dropdown">
          <button class="dropbtn">{{trans('main.sidebarfront.Category')}} <i class="fa fa-chevron-down"></i></button>
          <div class="dropdown-content">
            <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 4</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
        <div class="dropdown">
          <button class="dropbtn">{{trans('main.sidebarfront.Category')}} <i class="fa fa-chevron-down"></i></button>
          <div class="dropdown-content">
            <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 4</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
        <div class="dropdown">
          <button class="dropbtn">{{trans('main.sidebarfront.Category')}} <i class="fa fa-chevron-down"></i></button>
          <div class="dropdown-content">
            <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 4</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
        <div class="dropdown">
          <button class="dropbtn">{{trans('main.sidebarfront.Category')}} <i class="fa fa-chevron-down"></i></button>
          <div class="dropdown-content">
            <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 4</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
        <div class="dropdown">
          <button class="dropbtn">{{trans('main.sidebarfront.Category')}} <i class="fa fa-chevron-down"></i></button>
          <div class="dropdown-content">
            <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
            <a href="#">{{trans('main.sidebarfront.Category')}} 4</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="main-slider" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
            <li data-target="#main-slider" data-slide-to="3"></li>
            <li data-target="#main-slider" data-slide-to="4"></li>
            <li data-target="#main-slider" data-slide-to="5"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="{{ asset('images/bath1.jpg') }}" alt="bath">
              <div class="carousel-caption">
                <h2>{{trans('main.homeslider.Awtad')}}</h2>
                <h4>{{trans('main.homeslider.Sanitary')}}</h4>
              </div>
            </div>

            <div class="item">
              <img src="{{ asset('images/bath2.jpg') }}" alt="bath">
              <div class="carousel-caption">
                <h2>{{trans('main.homeslider.Awtad')}}</h2>
                <h4>{{trans('main.homeslider.Sanitary')}}</h4>
              </div>
            </div>

            <div class="item">
              <img src="{{ asset('images/bath3.jpg') }}" alt="bath">
              <div class="carousel-caption">
                <h2>{{trans('main.homeslider.Awtad')}}</h2>
                <h4>{{trans('main.homeslider.Sanitary')}}</h4>
              </div>
            </div>

            <div class="item">
              <img src="{{ asset('images/bath4.jpg') }}" alt="bath">
              <div class="carousel-caption">
                <h2>{{trans('main.homeslider.Awtad')}}</h2>
                <h4>{{trans('main.homeslider.Sanitary')}}</h4>
              </div>
            </div>

            <div class="item">
              <img src="{{ asset('images/bath5.jpg') }}" alt="bath">
              <div class="carousel-caption">
                <h2>{{trans('main.homeslider.Awtad')}}</h2>
                <h4>{{trans('main.homeslider.Sanitary')}}</h4>
              </div>
            </div>

            <div class="item">
              <img src="{{ asset('images/bath6.jpg') }}" alt="bath">
              <div class="carousel-caption">
                <h2>{{trans('main.homeslider.Awtad')}}</h2>
                <h4>{{trans('main.homeslider.Sanitary')}}</h4>
              </div>
            </div>

          </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#main-slider" data-slide="prev">
            <span style="position: absolute; top: 50%;">
              @if (app()->getLocale() == 'ar')
              <i class="fa fa-chevron-right"></i>
              @else
              <i class="fa fa-chevron-left"></i>
              @endif
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#main-slider" data-slide="next">
            <span style="position: absolute; top: 50%;">
              @if (app()->getLocale() == 'ar')
              <i class="fa fa-chevron-left"></i>
              @else
              <i class="fa fa-chevron-right"></i>
              @endif
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>