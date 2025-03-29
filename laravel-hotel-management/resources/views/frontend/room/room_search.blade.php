@extends('frontend.main_master')
@section('main')
    <div class="inner-banner inner-bg9">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>Rooms</li>
                </ul>
                <h3>Rooms</h3>
            </div>
        </div>
    </div>
    <div class="room-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color">ROOMS</span>
                <h2>Our Rooms & Rates</h2>
            </div>
            <div class="row pt-45">
                <?php $empty_array = []; ?>

                @forelse ($rooms as $item);

                    @php
                        $booking = App\Models\Booking::withCount('assign_rooms')
                            ->whereIn('id', $check_date_booking_ids)
                            ->where('rooms_id', $item->id)
                            ->get()
                            ->toArray();
                        $total_book_room = array_sum(array_column($booking, 'assign_rooms_count'));
                        $average_room = @$item->room_numbers_count - $total_book_room;
                    @endphp

                    @if ($average_room > 0 && old('persion') <= $item->total_adult)
                        <div class="col-lg-4 col-md-6">
                            <div class="room-card">
                                <a href="{{route('search.room.details', $item->id .'?check_in='.old('check_in').'&check_out='.old('check_out').'&persion='.old('persion'))}}">
                                    <img src="{{$item->image }}" alt="Images" style="width: 550px"
                                        height="330px">
                                </a>
                                <div class="content">
                                    <h6><a
                                            href="{{route('search.room.details', $item->id .'?check_in='.old('check_in').'&check_out='.old('check_out').'&persion='.old('persion'))}}">{{$item['type']['name'] }}</a>
                                    </h6>
                                    <ul>
                                        <li class="text-color">${{ $item->price }}</li>
                                        <li class="text-color">Per Night</li>
                                    </ul>
                                    <div class="rating text-color">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star-half'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <?php array_push($empty_array, $item->id) ?>
                    @endif

                @endforeach;

                @if (count($rooms) == count($empty_array))
                    <p class="text-center text-danger">No Data Found</p>
                @endif
            </div>

        </div>
    </div>
@endsection
