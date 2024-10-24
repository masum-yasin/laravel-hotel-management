@extends('frontend.main_master')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg10">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>Room Details </li>
                </ul>
                <h3>{{ $RoomDetails->type->name }}</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Room Details Area End -->
    <div class="room-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="room-details-side">
                        <div class="side-bar-form">
                            <h3>Booking Sheet </h3>




                            <form action="{{route('user_booking_store', $RoomDetails->id)}}" method="post" id="bk_form">
                                @csrf

                                
                                <input type="hidden" name="room_id" id="room_id" value="{{ $RoomDetails->id }}"
                                
                                
                                >
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Check in</label>
                                            <div class="input-group">
                                                <input autocomplete="off" type="text"
                                                    class="form-control dt_picker"required name="check_in" id="check_in"
                                                    value="{{ old('check_in') ? date('Y-m-d', strtotime(old('check_in'))) : '' }}">
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class='bx bxs-calendar'></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Check Out</label>
                                            <div class="input-group">
                                                <input autocomplete="off" type="text" name="check_out" id="check_out"
                                                    class="form-control dt_picker"
                                                    value="{{ old('check_out') ? date('Y-m-d', strtotime(old('check_out'))) : '' }}">
                                                <span class="input-group-addon"></span>
                                            </div>
                                            <i class='bx bxs-calendar'></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Numbers of Persons</label>
                                            <select class="form-control" name="persion" id="number_person">
                                                @for ($i = 1; $i <= 4; $i++)
                                                    <option {{ old('persion') == $i ? 'selected' : '' }}
                                                        value="0{{ $i }}">0{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
        <input type="hidden" name="total_adult" id="total_adult"
            value="{{ $RoomDetails->total_adult }}">
        <input type="hidden" name="room_price" id="room_price"
            value="{{ $RoomDetails->price }}">
        <input type="hidden" name="room_discount" id="room_discount"
            value="{{$RoomDetails->discount }}">




                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Numbers of Rooms</label>
                                            <select class="form-control roomNumber" name="roomNumber" id="select_room">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <option value="0{{ $i }}">0{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        {{-- <input type="" name="available_room" id="available_room">
                                        <p class="available_room"></p> --}}
                                    </div>
                                    <div class="col-lg-12">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p>SubTotal</p>
                                                    </td>
                                                    <td style="text-align: right"><span class="t_subtotal text-danger">34</span></td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Discount</p>
                                                    </td>
                                                    <td style="text-align: right"><span class="t_discount text-danger">34</span></td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Total</p>
                                                    </td>
                                                    <td style="text-align: right"><span class="t_g_total text-danger">34</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-bg-three border-radius-5">
                                            Book Now
                                        </button>
                                    </div>
                                </div>
                            </form>




                        </div>


                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="room-details-article">
                        <div class="room-details-slider owl-carousel owl-theme">
                            <div class="room-details-item">
                                <img src="{{ asset('frontend/assets/img/room/room-details-img1.jpg') }}" alt="Images">
                            </div>
                            <div class="room-details-item">
                                <img src="{{ asset('frontend/assets/img/room/room-details-img2.jpg') }}" alt="Images">
                            </div>
                            <div class="room-details-item">
                                <img src="{{ asset('frontend/assets/img/room/room-img1.jpg') }}" alt="Images">
                            </div>
                        </div>





                        <div class="room-details-title">
                            <h2>{{ $RoomDetails->type->name }}</h2>
                            <ul>

                                <li>
                                    <b> Basic : {{ $RoomDetails->price }}/Night/Room</b>
                                </li>

                            </ul>
                        </div>

                        <div class="room-details-content">
                            <p>
                                {!! $RoomDetails->description !!}
                            </p>




                            <div class="side-bar-plan">
                                <h3>Basic Plan Facilities</h3>
                                <ul>
                                    @foreach ($Facility as $item)
                                        <li><a href="#">{{ $item->facility_name }}</a></li>
                                    @endforeach
                                </ul>


                            </div>







                            <div class="row">
                                <div class="col-lg-6">



                                    <div class="services-bar-widget">
                                        <h3 class="title">Download Brochures</h3>
                                        <div class="side-bar-list">
                                            <ul>
                                                <li>
                                                    <a href="#"> <b>Capacity : {{ $RoomDetails->room_capacity }}</b>
                                                        1 Person <i class='bx bxs-cloud-download'></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"> <b>Size : {{ $RoomDetails->size }}</b> 25m2 /
                                                        276ft2 <i class='bx bxs-cloud-download'></i></a>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>




                                </div>



                                <div class="col-lg-6">
                                    <div class="services-bar-widget">
                                        <h3 class="title">Download Brochures</h3>
                                        <div class="side-bar-list">
                                            <ul>
                                                <li>
                                                    <a href="#"> <b>View : {{ $RoomDetails->view }} <i
                                                                class='bx bxs-cloud-download'></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"> <b>Bad Style : {{ $RoomDetails->bed_style }}</b>
                                                        Smallsize / Twin <i class='bx bxs-cloud-download'></i></a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>

                        <div class="room-details-review">
                            <h2>Clients Review and Retting's</h2>
                            <div class="review-ratting">
                                <h3>Your retting: </h3>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                            </div>



                            <form>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" cols="30" rows="8" required
                                                data-error="Write your message" placeholder="Write your review here.... "></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-bg-three">
                                            Submit Review
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Details Area End -->

    <!-- Room Details Other -->
    <div class="room-details-other pb-70">
        <div class="container">
            <div class="room-details-text">
                <h2>Our Related Offer</h2>
            </div>

            <div class="row ">
                @foreach ($otherRoom as $item)
                    <div class="col-lg-6">
                        <div class="room-card-two">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-4 p-0">
                                    <div class="room-card-img">
                                        <a href="room-details.html">
                                            <img src="{{ asset('upload/roomimg/' . $item->image) }}" alt="Images"
                                                style="550px" height="300px">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-8 p-0">
                                    <div class="room-card-content">
                                        <h3>
                                            <a href="room-details.html">{{ $item->type->name }}</a>
                                        </h3>
                                        <span>{{ $item->price }}/ Per Night </span>
                                        <div class="rating">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                        </div>
                                        <p>{{ $item->short_desc }}</p>
                                        <ul>
                                            <li><i class='bx bx-user'></i> {{ $item->room_capacity }} Person</li>
                                            <li><i class='bx bx-expand'></i>{{ $item->size }} ft2</li>
                                        </ul>

        <ul>
            <li><i class='bx bx-show-alt'></i>{{ $item->view }}</li>
            <li><i class='bx bxs-hotel'></i>{{ $item->bed_style }}</li>
        </ul>

                                        <a href="room-details.html" class="book-more-btn">
                                            Book Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Room Details Other End -->

    <script>
  
    $(document).ready(function() {
       

        var check_in = "{{ old('check_in') }}";
       
        var check_out = "{{ old('check_out') }}";
      
        var room_id = "{{ $room_id }}";


        if (check_in !== '' && check_out !== '') {
            getAvailability(check_in, check_out, room_id);
        }

        $('#check_out').on('change', function() {
        
       
            var check_out = $(this).val();
            var check_in = $("#check_in").val();

            if (check_in !== '' && check_out !== '') {
                getAvailability(check_in, check_out, room_id);
            }
        });

        $('.roomNumber').on('change', function() {
            var check_out = $('#check_out').val();
            var check_in = $('#check_in').val();
           
            if (check_in !== '' && check_out !== '') {
                getAvailability(check_in, check_out, room_id);
            }
        });

        function getAvailability(check_in, check_out, room_id) {
            $.ajax({
                url: "{{ route('check_room_availability') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    room_id: rooms_id,
                    check_in: check_in,
                    check_out: check_out
                },
                success: function(data) {
                    console.log(data); // For debugging
                    $('.available_room').html('Availability: <span class="text-success">'+data['available_room']+' Rooms</span>');
                    $('#available_room').val(data['available_room']);

                    
                    price_calculate(data.total_nights);
                },
               
            });
        }

        function price_calculate(total_nights) {
            var room_price = parseFloat($('#room_price').val());
          
            var room_discount = parseFloat($('#room_discount').val());
            var select_room = parseInt($('#select_room').val());

            var sub_total = room_price * total_nights * select_room;
            var discount_price = (room_discount / 100) * sub_total;
            var grand_total = sub_total - discount_price;

            $('.t_subtotal').text(sub_total.toFixed(2));
            $('.t_discount').text(discount_price.toFixed(2));
            $('.t_g_total').text(grand_total.toFixed(2));
        }

        $('#bk_form').on('submit', function() {
            var available_room = parseInt($('#available_room').val());
            var select_room = parseInt($('#select_room').val());

            // if (select_room > available_room) {
            //     alert('Sorry, you selected more rooms than available.');
            //     return false;
            // }

            var number_person = parseInt($('#number_person').val());
            var total_adult = parseInt($('#total_adult').val());

            if (number_person > total_adult) {
                alert('Sorry, you selected more persons than allowed.');
                return false;
            }
        });
    })

    </script>


@endsection
