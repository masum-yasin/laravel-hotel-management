@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lineicons@2.0.1/dist/lineicons.min.css">

    
<div class="page-content">
        <div class="container">
            <div class="main-body">
                <div class="row">


                    <div class="card-body">
                        <ul class="nav nav-tabs nav-primary" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Manage Room</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Room Number</div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
                                <form class="row g-3" action="{{ route('update.room', $editData->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <h5 class="mb-4">UPDATE ROOM</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input1" class="form-label">Room Type Name</label>
                                        <input type="text" class="form-control" id="input1" name="roomtype_id"
                                            value="{{ $editData['type']['name'] }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input2" class="form-label">Total Adult</label>
                                        <input type="text" class="form-control" id="input2" name="total_adult"
                                            value="{{ old('total_adult', $editData->total_adult) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input2" class="form-label">Totla Child</label>
                                        <input type="text" class="form-control" id="input2" name="total_child"
                                            value="{{ old('total_child', $editData->total_child) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input3" class="form-label">Main Image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        <img id="showImage"
                                            src="{{ !empty($editData->image) ? url('upload/roomimg/' . $editData->image) : url('upload/no_image.jpg') }}"
                                            class="rounded-circle p-1 bg-primary" alt="" width="120px">


                                    </div>
                                    <div class="col-md-6">
                                        <label for="input4" class="form-label">Gallery Image</label>
                                        <input type="file" class="form-control" id="multiImg" name="multi_img[]"
                                            accept="image/jpeg, image/jpg, image/gif, image/png" multiple>
                                    
                                        @foreach ($multiImage as $item)
                                            <div class="image-container" style="position: relative; display: inline-block;">
                                                <img src="{{ !empty($item->image) ? url('upload/roomimg/multi_img/' . $item->image) : url('upload/no_image.jpg') }}"
                                                    class="rounded-circle p-1 bg-primary" alt="" width="60px" height="50px">
                                    
                                                <!-- Delete icon with absolute positioning -->
                                                <a href="{{ route('multi.image.delete', $item->id) }}" style="position: absolute; top: 0; right: 0; background-color: rgba(0, 0, 0, 0.5); padding: 5px; border-radius: 50%;">
                                                    <i class="lni lni-close" style="font-size: 20px; color: white;"></i>
                                                </a>
                                            </div>
                                        @endforeach
                                        <div class="row" id="preview_img"></div>
                                    </div>
                                    



                                    <div class="col-md-3">
                                        <label for="input1" class="form-label">Room Price</label>
                                        <input type="number" class="form-control" id="input1" name="price"
                                            value="{{ old('price', $editData->price) }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="input1" class="form-label">Size</label>
                                        <input type="text" class="form-control" id="input1" name="size"
                                            value="{{ old('size', $editData->size) }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="input2" class="form-label">Discount (%)</label>
                                        <input type="text" class="form-control" id="input2" name="discount"
                                            value="{{ old('discount', $editData->discount) }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="input2" class="form-label">Room Capacity</label>
                                        <input type="text" class="form-control" id="input2" name="room_capacity"
                                            value="{{ old('room_capacity', $editData->room_capacity) }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="input7" class="form-label">Room View</label>
                                        <select id="input7" class="form-select" name="view">
                                            <option selected="">Choose...</option>
                                            <option value="Sea View"
                                                {{ $editData->view == 'sea view' ? 'selected' : '' }}>Sea
                                                View</option>
                                            <option value="Hill View"
                                                {{ $editData->view == 'Hill View' ? 'selected' : '' }}>
                                                Hill View</option>
                                            <option
                                                value="Natural View"{{ $editData->view == 'Natural View' ? 'selected' : '' }}>
                                                Natural View</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="input7" class="form-label">Bed Style</label>
                                        <select id="input7" class="form-select" name="bed_style">
                                            <option selected="">Choose...</option>
                                            <option value="Queen Bed"
                                                {{ $editData->bed_style == 'Queen Bed' ? 'selected' : '' }}>Queen Bed
                                            </option>
                                            <option
                                                value="Twin Bed"{{ $editData->bed_style == 'Twin Bed' ? 'selected' : '' }}>
                                                Twin Bed</option>
                                            <option
                                                value="King Bed"{{ $editData->bed_style == 'King Bed' ? 'selected' : '' }}>
                                                King Bed</option>
                                        </select>
                                    </div>








                                    <div class="col-md-12">
                                        <label for="input11" class="form-label">Short Description</label>
                                        <textarea class="form-control" id="input11" placeholder="Address ..." rows="3" name="short_desc">{{ $editData->short_desc }}</textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="input11" class="form-label">Description</label>
                                        <textarea id="editor"class="form-control" name="description" rows="3">{{ $editData->description }}</textarea>
                                    </div>



                                    <div class="row mt-2">
                                        <div class="col-md-12 mb-3">
                                            @forelse ($basic_facility as $item)
                                                <div class="basic_facility_section_remove"
                                                    id="basic_facility_section_remove">
                                                    <div class="row add_item">
                                                        <div class="col-md-8">
                                                            <labelz for="facility_name" class="form-label"> Room
                                                                Facilities
                                                            </labelz>
                                                            <select name="facility_name[]" id="facility_name"
                                                                class="form-control">
                                                                <option value="">Select Facility</option>
                                                                <option value="Complimentary Breakfast"
                                                                    {{ $item->facility_name == 'Complimentary Breakfast' ? 'selected' : '' }}>
                                                                    Complimentary Breakfast</option>
                                                                <option value="32/42 inch LED TV"
                                                                    {{ $item->facility_name == 'Complimentary Breakfast' ? 'selected' : '' }}>
                                                                    32/42 inch LED TV</option>

                                                                <option value="Smoke alarms"
                                                                    {{ $item->facility_name == 'Smoke alarms' ? 'selected' : '' }}>
                                                                    Smoke alarms</option>

                                                                <option value="Minibar"
                                                                    {{ $item->facility_name == 'Complimentary Breakfast' ? 'selected' : '' }}>
                                                                    Minibar</option>

                                                                <option value="Work Desk"
                                                                    {{ $item->facility_name == 'Work Desk' ? 'selected' : '' }}>
                                                                    Work Desk</option>

                                                                <option value="Free Wi-Fi"
                                                                    {{ $item->facility_name == 'Free Wi-Fi' ? 'selected' : '' }}>
                                                                    Free Wi-Fi</option>

                                                                <option value="Safety box"
                                                                    {{ $item->facility_name == 'Safety box' ? 'selected' : '' }}>
                                                                    Safety box</option>

                                                                <option value="Rain Shower"
                                                                    {{ $item->facility_name == 'Rain Shower' ? 'selected' : '' }}>
                                                                    Rain Shower</option>

                                                                <option value="Slippers"
                                                                    {{ $item->facility_name == 'Slippers' ? 'selected' : '' }}>
                                                                    Slippers</option>

                                                                <option value="Hair dryer"
                                                                    {{ $item->facility_name == 'Hair dryer' ? 'selected' : '' }}>
                                                                    Hair dryer</option>

                                                                <option value="Wake-up service"
                                                                    {{ $item->facility_name == 'Wake-up service' ? 'selected' : '' }}>
                                                                    Wake-up service</option>

                                                                <option value="Laundry & Dry Cleaning"
                                                                    {{ $item->facility_name == 'Laundry & Dry Cleaning' ? 'selected' : '' }}>
                                                                    Laundry & Dry Cleaning</option>

                                                                <option value="Electronic door lock"
                                                                    {{ $item->facility_name == 'Electronic door lock' ? 'selected' : '' }}>
                                                                    Electronic door lock</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group" style="padding-top: 30px;">
                                                                <a class="btn btn-success addeventmore p-3"><i
                                                                        class="lni lni-circle-plus"></i></a>
                                                                <span class="btn btn-danger btn-sm removeeventmore p-3"><i
                                                                        class="lni lni-circle-minus"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @empty

                                                <div class="basic_facility_section_remove"
                                                    id="basic_facility_section_remove">
                                                    <div class="row add_item">
                                                        <div class="col-md-6">
                                                            <label for="basic_facility_name" class="form-label">Room
                                                                Facilities </label>
                                                            <select name="facility_name[]" id="basic_facility_name"
                                                                class="form-control">
                                                                <option value="">Select Facility</option>
                                                                <option value="Complimentary Breakfast">Complimentary
                                                                    Breakfast</option>
                                                                <option value="32/42 inch LED TV"> 32/42 inch LED TV
                                                                </option>
                                                                <option value="Smoke alarms">Smoke alarms</option>
                                                                <option value="Minibar"> Minibar</option>
                                                                <option value="Work Desk">Work Desk</option>
                                                                <option value="Free Wi-Fi">Free Wi-Fi</option>
                                                                <option value="Safety box">Safety box</option>
                                                                <option value="Rain Shower">Rain Shower</option>
                                                                <option value="Slippers">Slippers</option>
                                                                <option value="Hair dryer">Hair dryer</option>
                                                                <option value="Wake-up service">Wake-up service</option>
                                                                <option value="Laundry & Dry Cleaning">Laundry & Dry
                                                                    Cleaning</option>
                                                                <option value="Electronic door lock">Electronic door lock
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group" style="padding-top: 30px;">
                                                                <a class="btn btn-success addeventmore p-3"><i
                                                                        class="lni lni-circle-plus"></i></a>

                                                                <span class="btn btn-danger removeeventmore p-3"><i
                                                                        class="lni lni-circle-minus"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforelse



                                        </div>
                                    </div>
                                    <br>

                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- Here is primaryhome end --}}






                            <div class="tab-pane fade" id="primaryprofile" role="tabpanel">

                                <div class="card">
                                    <div class="card-body">
                                        <a class="card-title btn btn-primary float-right p-4 text-white text-center"
                                            onclick="addRoomNo()" id="addRoomNo"><i class="lni lni-plus">Add New</i></a>

                                        {{-- Room Number form start --}}


                                        <div class="roomnoHide" id="roomnoHide">
                                            <form action="{{ route('store.room.no', $editData->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" id="" name="room_type_id"
                                                    value="{{ $editData->roomtype_id }}">

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="input2" class="form-label">Room No</label>
                                                        <input type="text" class="form-control" id="input2"
                                                            name="room_no">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="input7" class="form-label">Room Status</label>
                                                        <select id="input7" class="form-select" name="status">
                                                            <option selected="">select Status...</option>
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">inActive</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button type="submit" class="btn btn-success"
                                                            style="margin-top: 28px">Save As</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end primaryProfile --}}


                            <div class="card-body">
                                <table class="table mb-0 table-striped" id="roomview">
                                    <thead>

                                        <tr>
                                            <th scope="col">Room Number</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allRoomNumber as $key => $item)
                                            <tr>
                                                <th>{{ ++$key }}</th>
                                                <td>{{ $item->room_no }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td class="d-flex; gap-3">
                                                    <a href="{{ route('edit.roomno', $item->id) }}"><i
                                                            class="btn btn-warning">Edit</i></a>
                                                    <a href="{{ route('delete.roomno', $item->id) }}" id="delete"><i
                                                            class="btn btn-danger p-2">Delete</i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0'])
            });
        });
    </script>

    <!--------===Show MultiImage ========------->
    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element 
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>


    <!--========== Start of add Basic Plan Facilities ==============-->
    <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="basic_facility_section_remove" id="basic_facility_section_remove">
                <div class="container mt-2">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="basic_facility_name">Room Facilities</label>
                            <select name="facility_name[]" id="basic_facility_name" class="form-control">
                                <option value="">Select Facility</option>
                                <option value="Complimentary Breakfast">Complimentary Breakfast</option>
                                <option value="32/42 inch LED TV"> 32/42 inch LED TV</option>
                                <option value="Smoke alarms">Smoke alarms</option>
                                <option value="Minibar"> Minibar</option>
                                <option value="Work Desk">Work Desk</option>
                                <option value="Free Wi-Fi">Free Wi-Fi</option>
                                <option value="Safety box">Safety box</option>
                                <option value="Rain Shower">Rain Shower</option>
                                <option value="Slippers">Slippers</option>
                                <option value="Hair dryer">Hair dryer</option>
                                <option value="Wake-up service">Wake-up service</option>
                                <option value="Laundry & Dry Cleaning">Laundry & Dry Cleaning</option>
                                <option value="Electronic door mb-3">Electronic door lock</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="padding-top:20px">
                            <span class="btn btn-success pt-4 addeventmore"><i class="lni lni-circle-plus"></i></span>
                            <span class="btn btn-danger pt-4 removeeventmore"><i class="lni lni-circle-minus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $("#whole_extra_item_add").html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", ".removeeventmore", function(event) {
                $(this).closest("#basic_facility_section_remove").remove();
                counter -= 1
            });
        });
    </script>
    <!--========== End of Basic Plan Facilities ==============-->


    <!--==========Start Room Number Add ==============-->
    <script>
        $('#roomnoHide').hide();
        $('#roomview').show();

        function addRoomNo() {
            $('#roomnoHide').show();
            $('#roomview').hide();
            $('#addRoomNo').hide();
        }
    </script>



    <!--========== End of Basic Plan Facilities ==============-->



    
@endsection
