@extends('frontend.main_master')
@section('title','User Profile')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <!-- Inner Banner -->
     <div class="inner-banner inner-bg6">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>User Booking</li>
                </ul>
                <h3>User Booking List</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Service Details Area -->
    <div class="service-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                 <div class="col-lg-3">
                    @include('frontend.Dashboard.user_menu')
                </div>


                <div class="col-lg-9">
                    <div class="service-article">
                        

        <section class="checkout-area pb-70">
        <div class="container">
            <form  action="{{route('user.password.update')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="billing-details">
                            <h3 class="title">User Booking List</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">B No</th>
                                        <th scope="col">B Date</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col" style="width: 200px; max-width: 200px; overflow: hidden; white-space: nowrap;text-align:center">Room</th>
                                        <th scope="col"  style="width: 250px; max-width: 250px; overflow: hidden; white-space: nowrap; text-align:center">Check In/Out</th>
                                        <th scope="col">Total Room</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userBooking as $item)
                                    <tr>
                                        <td> <a href="{{route('userpdf.invoice', $item->id)}}"> {{ $item->code }}</a></td>
                                        <td>{{($item->created_at)->format('d/m/Y') }}</td>
                                        <td>{{($item->user)->name }}</td>
                                        <td style="width: 250px; max-width: 250px; overflow: hidden; white-space: nowrap;text-align:center">{{($item->room)->type->name }}</td>
                                        <td style="width: 250px; max-width: 250px; overflow: hidden; white-space: nowrap; text-align:center">
                                            <span class="bg-primary">{{ $item->check_in }}</span> / 
                                            <span class="bg-warning">{{ $item->check_out }}</span>
                                        </td>
                                        <td>{{ $item->number_of_rooms }}</td>
                                       
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="bg-success text-white">Complete</span>
                                                @else
                                                <span class="bg-info text-white">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                           
                    </div>
                    </div>
                    </div>
                    </form>      
                        </div>
                        </section>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
@endsection