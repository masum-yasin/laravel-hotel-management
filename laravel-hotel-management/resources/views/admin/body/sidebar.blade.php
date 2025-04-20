
<style>
.sidebar-wrapper {
    height: 100vh; /* Full height */
    overflow-y: auto; /* Fallback scrollbar if SimpleBar fails */
}
</style>

<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('')}}backend/assets/images/radisson.png" class="logo-icon" alt="logo icon" style="width:150px">
        </div>
       
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Team</div>
            </a>
            <ul>
                <li> <a href="{{route('all.team')}}"><i class='bx bx-radio-circle'></i>All Team</a>
                </li>
                <li> <a href="{{route('create.team')}}"><i class='bx bx-radio-circle'></i>Add Team</a>
                </li>
               
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Book Area</div>
            </a>
            <ul>
                <li> <a href="{{route('book.area')}}"><i class='bx bx-radio-circle'></i>Update Book Area</a>
                </li>
             
               
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Room Type</div>
            </a>
            <ul>
                <li> <a href="{{route('room.type.list')}}"><i class='bx bx-radio-circle'></i>Room Type List</a>
                </li>
             
               
            </ul>
        </li>
        <li class="menu-label">Booking Manage</li>
      
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Booking</div>
            </a>
            <ul>
                <li> <a href="{{route('booking.list')}}"><i class='bx bx-radio-circle'></i>Booking List</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class='bx bx-radio-circle'></i>Product Details</a>
                </li>
               </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Manage Room List</div>
            </a>
            <ul>
               
                <li> <a href="{{route('view.room.list')}}"><i class='bx bx-radio-circle'></i>Room List</a>
                </li>
               
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Testimonial</div>
            </a>
            <ul>
               
                <li> <a href="{{route('alltestimonial')}}"><i class='bx bx-radio-circle'></i>All Testimonial</a>
                </li>
                <li> <a href="{{route('testimonial.add')}}"><i class='bx bx-radio-circle'></i>Add Testimonial</a>
                </li>
               
            </ul>
        </li>


        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Blog Category</div>
            </a>
            <ul>
               
                <li> <a href="{{route('blog.category')}}"><i class='bx bx-radio-circle'></i>All Blog Category</a>
                </li>
                <li> <a href="{{route('all.blog.post')}}"><i class='bx bx-radio-circle'></i>All Blog Post</a>
                </li>
               
            </ul>
        </li>


        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Manage Comments</div>
            </a>
            <ul>
               
                <li> <a href="{{route('all.comment')}}"><i class='bx bx-radio-circle'></i>All Comment</a>
                </li>
               
               
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Booking Report</div>
            </a>
            <ul>
               
                <li> <a href="{{route('booking.report')}}"><i class='bx bx-radio-circle'></i>Booking Report</a>
                </li>
               
               
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Gallery</div>
            </a>
            <ul>
               
                <li> <a href="{{route('all.gallery')}}"><i class='bx bx-radio-circle'></i>All Gallery</a>
                </li>
               
               
            </ul>
        </li>


        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Contact Message</div>
            </a>
            <ul>
               
                <li> <a href="{{route('contact.message')}}"><i class='bx bx-radio-circle'></i>Contact Message</a>
                </li>
               
               
            </ul>
        </li>
       
       
    </ul>
    <!--end navigation-->
</div>