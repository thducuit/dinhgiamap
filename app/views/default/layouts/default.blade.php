<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ $title ? $title : 'CenGroup' }}</title>

    {{ HTML::style('https://fonts.googleapis.com/css?family=Lato:400,100,300,700') }}

    <!-- CSS -->
    <!--<link href="css/normalize.min.css" rel="stylesheet">-->
    <!--<link href="css/cenvalue.css" rel="stylesheet">-->
    <!--<link href="css/responsive.css" rel="stylesheet">-->

    {{ HTML::style('default/css/bootstrap.min.css') }}
    {{ HTML::style('default/css/normalize.min.css') }}
    {{ HTML::style('//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css') }}
    {{ HTML::style('default/css/bootstrap-multiselect.css') }}
    {{ HTML::style('default/css/cenvalue.css') }}
    
    {{ HTML::style('default/css/responsive.css') }}
    {{ HTML::style('default/css/detail.css') }}
    {{ HTML::style('default/css/modal.plan.css') }}
    {{ HTML::style('default/css/jquery.bxslider.css') }}
    {{ HTML::style('default/css/custom.css') }}

    {{ HTML::style('http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css') }}
    {{ HTML::style('admin/css/leaflet.draw.css') }}
    {{ HTML::style('https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css') }}


    {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}
    {{ HTML::script('https://code.jquery.com/ui/1.12.0/jquery-ui.js') }}
    {{ HTML::script('http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js') }}

    <script>
      var geocoder = '';
      function initMap() {
        geocoder = new google.maps.Geocoder();
      }
      ;
    </script>
    {{ HTML::script('http://maps.googleapis.com/maps/api/js?key=AIzaSyCFEQBvTi6zuAx2lh4Lte_bofdG8eMknlI&sensor=false&libraries=places,geometry&callback=initMap') }}

    {{	HTML::script('default/js/leaflet-google.js') }}
    {{	HTML::script('admin/js/custom/Google.js') }}
    {{ HTML::script('admin/js/custom/leaflet.draw.js') }}
    {{ HTML::script('https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js') }}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
      var placeInfo = null;
      var icon = {
        home: "{{ URL::asset('default/images/logo_icon2.png') }}",
        real: "{{ URL::asset('default/images/icon_marker.png') }}",
        address: "{{ URL::asset('default/images/icon_cenvalue.png') }}",
      };

      var url = {
        info: '{{ URL::to('/info') }}',
        planmap: '{{ URL::to('/planmap') }}',
        markers: '{{ URL::to('/markers') }}',
        searchMarkers: '{{ URL::to('/search-markers') }}',
        searchArea: '{{ URL::to('/search') }}',
        address: '{{ URL::to('/address') }}',
        price: '{{ URL::to('/price') }}',
        plan: '{{ URL::to('/plan') }}',
        street: '{{ URL::to('/streets') }}',
        priceStreet: '{{ URL::to('/streets/price') }}',
        district: '{{ URL::to('/district') }}',
        ward: '{{ URL::to('/ward') }}',
        login: '{{ URL::to('/login-ajax') }}',
        register: '{{ URL::to('/register-ajax') }}',
        getReal: '{{ URL::to('/reals') }}',
        reals: '{{ URL::to('/chi-tiet-tai-san-dang-giao-dich.html') }}'

      };

      jQuery(window).keydown(function (event) {
        if (event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });
    </script>
  </head>
  <body class="{{ $body_class }}">
    <div class="page_wrapper">
      <!--
      /*==============================*\
      HEADER 
      /*==============================*\
      -->
      <header>
        <div id="header">
          <div class="header_inner">
            <div class="header_show clearfix">
              <div id="logo"><a href="{{ URL::to('/index1') }}">cenvalue</a></div>
              <div id="menu_button"><span></span></div>
            </div>
            <div id="navigation">
              <div class="navigation_wrapper">
                <ul class="menu_list clearfix">

                 <!--  @if(!Sentry::check())
                    <li class="menu_item login-menu-item"><a class="clearfix dangNhap" href="#dangnhap"  data-toggle="modal" data-target="#modal_dangNhap"><i class="menu_icon icon_dangky"></i> <span>Đăng nhập</span></a></li>
                    <li class="menu_item register-menu-item"><a class="clearfix dangKy" href="#dangky" data-toggle="modal" data-target="#modal_dangky"><i class="menu_icon icon_dangky"></i> <span>Đăng ký</span></a></li>
                  @else
                    <li class="menu_item"><a class="clearfix dangNhap" href="{{ URL::to('/thong-tin-tai-khoan.html') }}"  ><i class="menu_icon icon_dangky"></i> <span>Thông tin tài khoản</span></a></li>
                  @endif -->

                    <li class="menu_item {{ isset($current) && $current == 1 ? 'current' : '' }}">
                      <a class="clearfix" href="{{ URL::to('/index1') }}">
                        <!-- <i class="menu_icon icon_trangchu"></i> --><span>Trang chủ</span>
                      </a>
                    </li>
                    <li class="menu_item {{ isset($current) && $current == 2 ? 'current' : '' }}">
                      <a class="clearfix" href="{{ URL::to('/ve-chung-toi.html') }}">
                        <!-- <i class="menu_icon icon_vechungtoi"></i> --><span>Giới thiệu</span>
                      </a>
                    </li>
                    <!-- <li class="menu_item {{ isset($current) && $current == 3 ? 'current' : '' }}">
                      <a class="clearfix" href="{{ URL::to('/xem-quy-hoach.html') }}">
                        <i class="menu_icon icon_xemquihoach"></i><span>Xem quy hoạch</span>
                      </a>
                    </li>

                    <li class="menu_item {{ isset($current) && $current == 9 ? 'current' : '' }}"><a class="clearfix" href="{{ URL::to('/tai-san-dang-giao-dich.html') }}"><i class="menu_icon icon_cungdongia"></i><span>Tài sản đang giao dịch</span></a></li> -->

                    <!-- <li class="menu_item {{ isset($current) && $current == 4 ? 'current' : '' }}"><a class="clearfix" href="{{ URL::to('/hoi-dap.html') }}"><i class="menu_icon icon_faq"></i><span>Hỏi đáp</span></a></li> -->

                    <li class="menu_item {{ isset($current) && $current == 5 ? 'current' : '' }}">
                      <a class="clearfix" href="{{ URL::to('/huong-dan.html') }}">
                          <!-- <i class="menu_icon icon_video"></i> --><span>Hướng dẫn sử dụng</span>
                      </a>
                    </li>

                    
                    

                    

                    

                    <!-- <li class="menu_item {{ isset($current) && $current == 6 ? 'current' : '' }}"><a class="clearfix" href="{{ URL::to('/lien-he.html') }}"><i class="menu_icon icon_lienhe"></i><span>Liên hệ</span></a></li> -->	


                    <li class="menu_item {{ isset($current) && $current == 7 ? 'current' : '' }}"><a class="clearfix" href="{{ URL::to('/dieu-khoan.html') }}"><span>Điều khoản bảo mật</span></a></li>									
                    <li class="menu_item {{ isset($current) && $current == 8 ? 'current' : '' }}"><a class="clearfix" href="{{ URL::to('/chinh-sach.html') }}"><span>Chính sách sử dụng</span></a></li>		

                    <li class="menu_item">
                      <a class="clearfix" href="#"><span>Đối tác chiến lược</span></a>
                    </li>
                    <li class="menu_item ads-slider">
                      <div id="group-images-1" class="group-images">
                        <ul class="bxslider-1" role="listbox">
                          <li class="image-item"><img  src="{{ URL::asset('default/images/logo/Logo-03.jpg') }}"></img></li>
                          <li class="image-item"><img  src="{{ URL::asset('default/images/logo/STDA ngang.jpg') }}"></img></li>
                          <li class="image-item"><img  src="{{ URL::asset('default/images/logo/logo-nghe moi gioi.png') }}"></img></li>
                        </ul>
                      </div>
                    </li>			
                    <li class="menu_item">
                      <a class="clearfix" href="#"><span>Khách hàng thân thiết</span></a>
                    </li>
                    <li class="menu_item ads-slider">
                      <div id="group-images-2" class="group-images">
                        <ul class="bxslider-2" role="listbox">
                          <li class="image-item"><img  src="{{ URL::asset('default/images/logo/logo techcombank.png') }}"></img></li>
                          <li class="image-item"><img  src="{{ URL::asset('default/images/logo/logo vietcombank.jpg') }}"></img></li>
                          <li class="image-item"><img  src="{{ URL::asset('default/images/logo/logo Agribank.jpg') }}"></img></li>
                        </ul>
                      </div>
                    </li>

                </ul>

                <!-- <ul class="submenu">
                    <li><a href="#"><span>Điều khoản bảo mật</span></a></li>
                    <li><a href="#"><span>Chính sách sử dụng</span></a></li>
                </ul> -->								
                <!-- <div class="nav_social">
                                                        
                    <p>Kết nối chúng tôi qua</p>
                    <p>Hotline</p>
                    <p><strong>1900 9079</strong></p>
                    <div class="social_list clearfix">
                        <a class="social_item social_item_facebook" href="#">Facebook</a>
                        <a class="social_item social_item_google" href="#">Google+</a>
                        <a class="social_item social_item_linkedin" href="#">Linkedin</a>
                    </div>
                </div>
            </div> -->
              </div>
            </div>
          </div>
      </header>

      @yield('content')

      <footer>
        <div id="footer">
          <div class="main_width clearfix">					
            <div class="footer_col" style="text-align: center;">

              <img  src="{{ URL::asset('default/images/icon_cenvalua3.png') }}" width="125" style="padding-top: 3px;">

            </div>
            <div class="footer_col text-center" style="text-align: center;" >
              <a href="#lienhe">
                <span>Hỗ trợ trực tuyến</span>
                <img src="{{ URL::asset('default/images/footer_hotro2.png') }}" style="    padding-bottom: 10px;">
              </a>

            </div>
            <div class="footer_col text-center" style="text-align: center;">
              <a href="{{ URL::to('/lien-he.html') }}">
                <span>Liên hệ định giá</span>
                <img src="{{ URL::asset('default/images/footer_lienhe3.png') }}" style="  padding-bottom: 4px;">
              </a>

            </div>
            <div class="footer_col text-center" style="text-align: center;">
              <div class="nav_social">
                <div class="social_list clearfix">
                  <a class="social_item social_item_facebook" href="#">Facebook</a>
                  <a class="social_item social_item_google" href="#">Google+</a>
                  <a class="social_item social_item_linkedin" href="#">Linkedin</a>
                </div>
              </div>

            </div>
            <div class="footer_col text-center" style="text-align: center;">
              <a href="#lienhe" >

                <img  src="{{ URL::asset('default/images/comodossl.png') }}" style="height: 30px;">
              </a>

            </div>

            <div class="footer_col text-center" style="text-align: center;">
              <a href="#lienhe">

                <img src="{{ URL::asset('default/images/icon_bocongthuong2.png') }}" style=" height: 30px;">
              </a>

            </div>

          </div>					

        </div>
      </footer>


      @include('partials.dongiasobo')
      @include('partials.active-email')
      @include('partials.active')
      @include('partials.activesuccess')
      @include('partials.changepassword-email')
      @include('partials.changepassword')
      @include('partials.codeactive')
      @include('partials.getpassword-email')
      @include('partials.login')
      @include('partials.lostpassword')
      @include('partials.popup')
      @include('partials.price')
      @include('partials.register')
      @include('partials.registersuccess')
      @include('partials.plan')

    </div>


    @include('partials.dongiasobo')

    @include('partials.areas')

  </div>

  <!-- JS -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/cenvalue.js"></script>
  
  <script src="js/bootstrap.min.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/moment-vi.js"></script>
  <script src="js/bootstrap-datetimepicker.js"></script>
  -->
  {{ HTML::script('default/js/bootstrap.min.js') }}
  {{ HTML::script('default/js/moment.js') }}
  {{ HTML::script('default/js/moment-vi.js') }}

  {{ HTML::script('default/js/zjs/z.min.js') }}
  {{ HTML::script('default/js/jquery.accordion.js') }}
  {{ HTML::script('default/js/bootstrap-multiselect.js') }}
  {{ HTML::script('default/js/cenvalue.js') }}
  {{ HTML::script('default/js/jquery.bxslider.js') }}
  {{ HTML::script('default/js/custom.js') }}

  <script>
    function passWord() {
      var testV = 1;
      var pass1 = prompt('Vui lòng nhập mật khẩu', ' ');
      while (testV < 3) {
        if (!pass1) {
          history.go(-1);
        }
        if (pass1.toLowerCase() == "dinhgiamap") {
          localStorage.setItem("logged", "true");
          window.location.href = "{{action('HomeController@view')}}";
          break;
        } else {
          localStorage.removeItem("logged");
        }
        testV += 1;
        var pass1 =
                prompt('Sai mật khẩu. Xin vui lòng nhập lại', 'Password');
      }
      if (testV == 3) {
        window.location.href = "https://www.google.com";
      }
      return " ";
    }
    if (!localStorage.getItem("logged")) {
      passWord();
    }
    var arrowPlay = "{{ URL::asset('default/images/arrow1.png') }}";
    var arrowDown = "{{ URL::asset('default/images/arrow-down.png') }}";
    $(document).ready(function () {
      $('#modal_ketqua_dongiasobo .notice-info, #modal_ketquadinhgia .notice-info').click(function () {        
        $('#modal_ketqua_dongiasobo .notice-info-content, #modal_ketquadinhgia .notice-info-content').toggle('slow');
        if ($('#modal_ketqua_dongiasobo .notice-info img, #modal_ketquadinhgia .notice-info img').attr('src').indexOf('arrow1.png') > -1) {
          $('#modal_ketqua_dongiasobo .notice-info img, #modal_ketquadinhgia .notice-info img').attr('src', arrowDown);
        } else {
          $('#modal_ketqua_dongiasobo .notice-info img, #modal_ketquadinhgia .notice-info img').attr('src', arrowPlay);
        }
      });


      $('.bxslider-1, .bxslider-2').bxSlider({
        auto: true,
        autoControls: false,
        controls: false,
        pager: false,
        autoDirection: 'prev'
      });
    });
  </script>
</body>
</html>