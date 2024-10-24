@extends('admin.admin_dashboard')
@section('title', 'Radisson Hotel')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-3 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Booking No:</p>
                                <h6 class="my-1 text-info">{{$editData->code;}}</h4>
                               
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class='bx bxs-cart'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card radius-10 border-start border-0 border-3 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Booking Date:</p>
                                <h6 class="my-1 text-danger">{{ \Carbon\Carbon::parse($editData->created_at)->format('d/m/Y')}}</h6>


                                

                                
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i
                                    class='bx bxs-wallet'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card radius-10 border-start border-0 border-3 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Payment Method:</p>
                                <h6 class="my-1 text-success">{{$editData->payment_method}}</h6>
                               
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i
                                    class='bx bxs-bar-chart-alt-2'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card radius-10 border-start border-0 border-2 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Payment Status</p>
                                <h6 class="my-1 text-warning">@if ($editData->payment_status == '1')
                                    <span class="text-success">Completed</span>
                                    @else
                                    <span class="text-danger">Panding</span>
                                @endif
                            </h6>
                               
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i
                                    class='bx bxs-group'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 border-start border-0 border-2 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Booking Status</p>
                                <h6 class="my-1 text-warning">@if ($editData->status== '1')
                                    <span class="text-danger">Completed</span>
                                    @else 
                                    <span class="text-danger">Panding</span>
                                @endif
                            </h6>
                               
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i
                                    class='bx bxs-group'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div><!--end row-->

        <div class="row mt-4">
            <div class="col-12 col-lg-8 d-flex">
                <div class="card radius-10 w-100">
                   
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Room Type</th>
                                    <th>Total Room</th>
                                    <th>Price</th>
                                    <th>Check In / Out Date</th>
                                    <th>Total Days</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$editData->room->type->name}}</td>
                                    <td>{{$editData->number_of_rooms}}</td>
                                    <td>{{$editData->actual_price}}</td>
                               
                                    
                                    <td class="p-4"><span class="badge bg-primary">{{$editData->check_in}}</span> / <br> <span class="badge bg-warning">{{$editData->check_out}} </span></td>
                                    <td>{{$editData->total_nights}}</td>
                                    <td>{{$editData->actual_price * $editData->number_of_rooms}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div  class="col-md-6" style="float: right">
                            <style>
                               .test_table td{
                                text-align: right;
                              
                               } 
                            </style>
                            <table class="table test_table" style="float: right">
                                <tr>
                                    <td>Subtotal</td>
                                    <td>{{$editData->subtotal}}</td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td>{{$editData->discount}}</td>
                                </tr>
                                <tr>
                                    <td>Grand total</td>
                                    <td>{{$editData->total_price}}</td>
                                </tr>
                            </table>
                        </div>
                      </div>




                      <div style="clear: both"></div>
                      <div style="margin-top: 40px; margin-bootom:40px">
                        <a href="javascript::void(0)" class="btn btn-primary assign_room"></a>
                      </div>


                      {{-- ending responsive table --}}
                      <form action="{{route('update.booking.status', $editData->id)}}" method="post">
                        @csrf
                        <div class="row" style="margin-top:40px">
                            <div class="col-md-5">
                                <label class="mb-2" for="">Payment Status</label>

                                <select class="form-select" name="payment_status">
                                    <option selected="">select Status...</option>
                                    <option value="0" {{$editData->status == '0' ? 'selected' : ''}}>Pending</option>
                                    <option value="1" {{$editData->status == '1' ? 'selected' : ''}}>Completed</option>
                                  
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label class="mb-2" for="">Booking Status</label>

                                <select class="form-select" name="status">
                                    <option selected="">select Status...</option>
                                    <option value="0" {{$editData->status == '0' ? 'selected' : ''}}>Pending</option>
                                    <option value="1" {{$editData->status == '1' ? 'selected' : ''}}>Completed</option>
                                  
                                </select>
                            </div>
                            <div class="col-md-12" style="margin-top: 20px">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                      </form>
                       
                    </div>
                   
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card radius-10 w-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Manage Room And Date</h6>
                            </div>
                           
                        </div>
                    </div>
                    <div class="card-body">
                       <form action="">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="">CheckIn</label>
                                <input type="date" required name="check_in" class="form-control" value="{{$editData->check_in}}" id="check_in">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="">CheckOut</label>
                                <input type="date" required name="check_out" class="form-control" value="{{$editData->check_out}}" id="check_out">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="">Room Number</label>
                                <input type="number" required name="number_of_rooms" class="form-control" value="{{$editData->number_of_rooms}}">
                            </div>
                            <input type="hidden" name="availablity_room" id="availablity_room" class="form-control" value="{{$editData->number_of_rooms}}">
                            <div class="col-md-12 mb-2">
                                <label for="">Availability: <span class="text-success availablity"></span></label>
                                
                            </div>
                            <div class="mt-2">
                                <button type="submit"class="btn btn-primary">Update</button>
                            </div>
                        </div>
                       </form>
                    </div>
                    
                </div>


                <div class="card radius-10 w-100 mt-4">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Customer Information</h6>
                        </div>
                       
                    </div>
                </div>
                <div class="card-body">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                            Name <span class="badge bg-success rounded-pill">{{$editData['user']['name']}}</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Email<span class="badge bg-danger rounded-pill">{{$editData->email}}</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Phone
                            <span class="badge bg-primary rounded-pill">{{$editData->phone}}</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Country <span class="badge bg-warning text-dark rounded-pill">{{$editData->country}}</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                            State <span class="badge bg-success rounded-pill">{{$editData->state}}</span>
                            <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                                Zip Code<span class="badge bg-danger rounded-pill">{{$editData->zip_code}}</span>
                            </li>
                            <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Address
                                <span class="badge bg-primary rounded-pill">{{$editData->address}}</span>
                            </li>
                    </ul>

                </div>

                </div>

            </div>
        </div><!--end row-->

    </div>


    <div class="modal fade myModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
               
            </div>
        </div>
    </div>



<script>
    $(document).ready(function(){
        function getAvailability();

        $('.assign_room').on('click', function(){
            $.ajax({
                url: "{{route('assign_room', $editData->id)}}";
                success: function (data){
                    $('.myModal . modal-body').html(data);
                    $('.myModal').modal('show');
                }
            })
            return false;

        })


    })
    function getAvailability(){
        var check_in = $('#check_in').val();
        var check_out = $('#check_out').val();
        var room_id   = "{{$editData->rooms_id}}";


        $.ajax({
        url: "{{route('check_room_availability')}}";
        data:{room_id:room_id, check_in:check_in, check_out:check_out};
        success: function (data){
            $('.availablity').text(data['availablity_room']);
            $('#availablity_room').text(data['availablity_room']);
        };
    });
    }
  
</script>
    
@endsection
