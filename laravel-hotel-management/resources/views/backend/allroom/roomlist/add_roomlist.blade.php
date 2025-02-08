@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add Room List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Room List</li>
                    </ol>
                </nav>
            </div>
          
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card-body p-4">
                            
                            <form class="row g-3" action="{{route('store.roomlist')}}" method="post">
                                @csrf
                                <div class="col-md-4">
                                    <label for="rootype_id" class="form-label">Room Type</label>
                                    <select name="room_id" id="room_id" class="form-select">
                                        <option selected="">Choose...</option>
                                    @foreach ($roomType as $item)
                                    <option value="{{ $item->id }}" {{ collect(old('rootype_id'))->contains($item->id) ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="rootype_id" class="form-label">ChekcIn</label>
                                    <input type="date" class="form-control" name="check_in" id="check_in" >
                                </div>
                                <div class="col-md-4">
                                    <label for="input2" class="form-label">CheckOut</label>
                                    <input type="date" class="form-control" id="check_out" placeholder="Check Out">
                                </div>
                                <div class="col-md-4">
                                    <label for="input3" class="form-label">Room</label>
                                    <input type="number" class="form-control" id="input3" name="number_of_rooms" id="number_of_rooms" placeholder="Room">
                                    <input type="hidden" class="form-control" name="available_room">
                                <div class="mt-2">
                                    <label for="" >Availability<span class="text-success availability"></span></label>
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="input4" class="form-label">Guest</label>
                                    <input type="text" name="number_of_person" class="form-control" id="number_of_person" placeholder="Guest">
                                </div>
                                <h1 class="mt-3 mb-5 text-center">Customer Information</h1>

                                <div class="col-md-4">
                                    <label for="input2" class="form-label">Name</label>
                                    <input type="text" class="form-control"  name="name" placeholder="Name" value="{{old('name')}}">
                                </div>

                                <div class="col-md-4">
                                    <label for="input5" class="form-label">Email</label>
                                    <input type="email" class="form-control"  placeholder="Eamil" value="{{old('email')}}"
                                    name="email">
                                </div>
                                <div class="col-md-4">
                                    <label for="input6" class="form-label">Phone</label>
                                    <input type="number" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Phone">
                                </div>
                                
                               
                                <div class="col-md-4">
                                    <label for="input6" class="form-label">Country</label>
                                    <input type="text" class="form-control" name="country" value="{{old('country')}}" placeholder="Country">
                                </div>
                                <div class="col-md-4">
                                    <label for="input6" class="form-label">State</label>
                                    <input type="text" class="form-control" name="state" value="{{old('state')}}" placeholder="State">
                                </div>
                                <div class="col-md-4">
                                    <label for="input6" class="form-label">Zip Code</label>
                                    <input type="number" class="form-control" name="zip_code" value="{{old('	zip_code')}}" placeholder="Zip Code">
                                </div>
                                <div class="col-md-12">
                                    <label for="input6" class="form-label">Address</label>
                                    <textarea name="address" class="form-control" name="address" rows="3" >{{old('address')}}</textarea>
                                    
                                </div>
                                
                              
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
   $('#room_id').on('change', function(){
    $('#check_in').val('');
    $('#check_out').val('');
    $('.availability').text('0');
    4('#number_of_rooms').val('0');
   })
$('#check_out').on('change', function(){
    getAvailability();
})

});





function getAvailability(){
    var check_in = $('#check_in').val();
    var check_out = $('#check_out').val();
    var room_id   = $('#room_id').val();
    var startDate = new Date(check_in);
    var endDate = new Date(check_out);
    if(startDate > endDate){
        alert('Invalid Date');
        $('#check_out').val();
        return false;
    }

    if(check_in != '' && check_out != '' && room_id != ''){
         $.ajax({
        url: "{{route('check_room_availability')}}",
        type:"GET",
        data: {room_id: room_id, check_in: check_in, check_out: check_out},
        success: function (data) {
            console.log(data);
    
            
            $('.availability').text(data['available_room']);
            $('#available_room').val(data['available_room']);
        }
    });
    }
    else{
        alert('Field must be not empty');
    }
   

}
    </script>
   
@endsection
