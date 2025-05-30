@extends('frontend.main_master')
@section('main')
   
   <!-- Inner Banner -->
   <div class="inner-banner inner-bg3">
    <div class="container">
        <div class="inner-title">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>Blog Details </li>
            </ul>
            <h3>Blog Details</h3>
        </div>
    </div>
</div>
<!-- Inner Banner End -->

<!-- Blog Details Area -->
<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-article">
                    <div class="blog-article-img">
                        <img src="{{asset($blogDetails->post_image)}}" alt="Images" style="width: 1000px; height:600px">
                    </div>

                    <div class="blog-article-title">
                        <h2>{{$blogDetails->post_title}}</h2>
                        <ul>
                            
                            <li>
                                <i class='bx bx-user'></i>
                                {{$blogDetails['user']['name']}}
                            </li>

                            <li>
                                <i class='bx bx-calendar'></i>
                                {{ optional($blogDetails->created_at)->format('M d, Y') }}
                            </li>
                        </ul>
                    </div>
                    
                    <div class="article-content">
                        <p>
                           
                      {!!$blogDetails->long_descp!!}
                        </p>
                    </div>

                    <div class="comments-wrap">
                        <h3 class="title">Comments</h3>
      
              
                        @php
                        $comments = App\Models\Comment::where('post_id', $blogDetails->id)
                                    ->where('status','1')
                                    ->limit(5)
                                    ->get();
                    @endphp
                    
                     
                        <ul>
                            @foreach ($comments as $comment)
                            <li>
                                <img src="{{(!empty($comment->user->photo)) ? url('upload/user_images/', $comment->user->photo) : url('upload/no_image.jpg')}}" class="rounded mx-auto d-block" alt="Image"
                style="width:60px; height:60px;"> 
                                <h3>{{$comment->user->name}}</h3>
                                <span>{{$comment->created_at->format('M d Y')}}</span>
                                <p>
                                    {{$comment->message}}
                                </p>
                                 
                            </li>
                            
                            @endforeach
                        </ul>
                     
                    </div>

                    <div class="comments-form">
                        <div class="contact-form">
                            <h2>Leave A Comment</h2>
                            @if (Auth::check())
                              @php
                                  $id = Auth::user()->id;
                                  $userData = App\Models\User::find($id);
                              @endphp
                              @else
                              @php
                                  $userData = null
                              @endphp
                              @endif
                        @auth
                            
                        <form method="POST" action="{{route('comment.store')}}">
                            @csrf
                                <input type="hidden" name="post_id" value="{{$blogDetails->id}}">
                                @if ($userData)
                                    <input type="hidden" name="user_id" value="{{$userData->id}}">
                                @endif
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input 
                                                type="text" 
                                                name="name" 
                                                id="name" 
                                                class="form-control" 
                                                readonly
                                                value="{{ $userData ? $userData->name : '' }}"
                                           style="color:green; font-weight:bold" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input 
                                                type="email" 
                                                name="email" 
                                                id="email" 
                                                class="form-control" 
                                                readonly
                                                value="{{ $userData ? $userData->email : '' }}"
                                                style="color:green; font-weight:bold"  >
                                        </div>
                                    </div>

                                    
    
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Your Message"></textarea>
                                        </div>
                                    </div>

                                   
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-bg-three">
                                            Post A Comment
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @else
                            <p style="text-align: center;">
                                <a href="{{ route('login') }}" 
                                   style="display: inline-block; background-color: #fff3cd; color: #856404; padding: 12px 24px; border-radius:20px; text-decoration: none; font-weight: bold; border: 1px solid #ffeeba;">
                                    Please Login first to add a comment
                                </a>
                            </p>
                            
                            
                            
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="side-bar-wrap">
                    <div class="search-widget">
                        <form class="search-form">
                            <input type="search" class="form-control" placeholder="Search...">
                            <button type="submit">
                                <i class="bx bx-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="services-bar-widget">
                        <h3 class="title">Blog Category</h3>
                        <div class="side-bar-categories">

                @foreach ($blogCategory as $cat)
                                
                            
                            <ul>
                                <li>
                                    <a href="{{url('blog/cat/list/'.$cat->id)}}">
                                        {{$cat->category_name}}
                                    </a>
                                </li>
                               
                            </ul>
                            @endforeach
                        </div>
                    </div>

                    <div class="side-bar-widget">
                        <h3 class="title">Recent Posts</h3>
                        <div class="widget-popular-post">
                            @foreach ($lblog as $item)
                                
                            
                            <article class="item">
                                <a href="blog-details.html" class="thumb">
                                    <img src="{{asset($blogDetails->post_image)}}" alt="Images" style="width: 80px; height:80px">
                                </a>
                                <div class="info">
                                    <h4 class="title-text">
                                        <a href="blog-details.html">
                                           {{$item->post_title}}
                                        </a>
                                    </h4>
                                    <ul>
                                        <li>
                                            <i class='bx bx-user'></i>
                                            29K
                                        </li>
                                        <li>
                                            <i class='bx bx-message-square-detail'></i>
                                            15K
                                        </li>
                                    </ul>
                                </div>
                            </article>
                            @endforeach
                            
                        </div>
                    </div>

                  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<!-- Blog Details Area End -->