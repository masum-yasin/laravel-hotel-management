@extends('frontend.main_master')
@section('main')
    <!-- Banner Area -->
    <div class="banner-area" style="height: 480px;">
        <div class="container">
            <div class="banner-content">
              
                
                 
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Banner Form Area -->
    <div class="banner-form-area">
        <div class="container">
            <div class="banner-form">
                <form method="get" action="{{route('booking.search')}}">
           
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label>CHECK IN TIME</label>
                                <div class="input-group">
                                    <input autocomplete="off" type="text" required name="check_in" class="form-control dt_picker" placeholder="yyyy-mm-dd">
                                    <span class="input-group-addon"></span>
                                </div>
                                <i class='bx bxs-chevron-down'></i>    
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label>CHECK IN TIME</label>
                                <div class="input-group">
                                    <input autocomplete="off" type="text" required name="check_in" class="form-control dt_picker" placeholder="yyyy-mm-dd">
                                    <span class="input-group-addon"></span>
                                </div>
                                <i class='bx bxs-chevron-down'></i>    
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <div class="form-group">
                                <label>GUESTS</label>
                                <select name="persion" class="form-control">
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                </select>	
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <button type="submit" class="default-btn btn-bg-one border-radius-5">
                                Check Availability
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Banner Form Area End -->

    <!-- Room Area -->
   @include('frontend.home.room_area')
    <!-- Room Area End -->

    <!-- room Area Two-->
    @include('frontend.home.room_area_two')
    <!-- room Area Two End -->

    <!-- Services Area Three -->
 @include('frontend.home.services')
    <!-- Services Area Three End -->

    <!-- Team Area Three -->
   @include('frontend.home.team')
    <!-- Team Area Three End -->

    <!-- Testimonials Area Three -->
  @include('frontend.home.testimonial')
    <!-- Testimonials Area Three End -->

    <!-- FAQ Area -->
    @include('frontend.home.faq')
    <!-- FAQ Area End -->

    <!-- Blog Area -->
  @include('frontend.home.blog')
    <!-- Blog Area End -->


  <script>
         $('.dt_picker').datepicker({
        dateFormat: 'yy-mm-dd',
        autoclose: true,
        minDate: 0
    });


    $("#startdate").datepicker({
        todayBtn:  1,
        startDate: new Date(),
        format: 'yyyy-mm-dd' ,
        autoclose: true,
        yearSelect: function(current) {
            return [current - 10, current + 10];
        },
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        minDate.setDate(minDate.getDate() + 1);

        $('#enddate').datepicker('setStartDate', minDate);
        $('#enddate').val('');
    });

    $("#enddate").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
    }).on('changeDate', function (selected) {
        console.log('ok')
    });
    </script> 


   
@endsection