@extends('layouts.home')

@section('content_header')
    <h1>
      Feed <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
      <li>
          <a href="#"><i class="fa fa-dashboard"></i> Home</a>
      </li>
      <li class="active">Feed</li>
    </ol>
@endsection

@section('content')
<div class="">
    <!-- <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div style="text-align:center; width: 30%; margin: auto; font-size:30px; background-color: lightgreen;">
                You are logged in!
            </div>
        </div>
    </div> -->

    <div class="row">
      <div class="col-lg-10 col-lg-offset-1 col-md-10 col-m-offset-1 col-sm-10 col-sm-offset-10">
        <!-- TWEET WRAPPER START -->
        <div class="twt-wrapper">
          <div class="panel panel-info">
            <div class="panel-heading">
              @company feed
            </div>
            <div class="panel-body">
              <textarea class="form-control" placeholder="Enter here for tweet..." rows="3"></textarea>
              <br />
              <a href="#" class="btn btn-primary btn-sm pull-right">Tweet</a>
              <div class="clearfix"></div>
              <hr />
              <ul class="media-list">
                  @foreach ($tweets as $tweet)
                      <li class="media">
                          <div class="profile-img-container pull-left">
                              <a style="cursor: pointer;" class="add-icon"><span class="glyphicon glyphicon-plus"></span></a>
                              <img src="{{ $tweet['user']['profile_image_url'] }}" alt="" class="img-circle">
                          </div>
                          <div class="media-body">
                              <span class="text-muted pull-right">
                                  <small class="text-muted">

                                      @if (\Carbon\Carbon::createFromTimeStamp(strtotime($tweet['created_at']))->diffInDays() > 30)
                                          {{ \Carbon\Carbon::createFromTimeStamp(strtotime($tweet['created_at']))->toFormattedDateString() }}
                                      @else
                                          {{\Carbon\Carbon::createFromTimeStamp(strtotime($tweet['created_at']))->diffForHumans()}}
                                      @endif
                                  </small>
                              </span>
                              <strong class="text-success">@ {{$tweet['user']['screen_name']}}</strong>
                              <p>
                                  {{$tweet['text']}}
                              </p>
                          </div>
                      </li>

                  @endforeach

                <!-- <li class="media">
                  <div class="profile-img-container pull-left">
                    <a class="add-icon"><span class="glyphicon glyphicon-plus"></span></a>
                    <img src="Assets/twitter-feed/img/1.png" alt="" class="img-circle">
                  </div>
                  <div class="media-body">
                    <span class="text-muted pull-right">
                                          <small class="text-muted">30 min ago</small>
                                      </span>
                    <strong class="text-success">@ Rexona Kumi</strong>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, <a href="#"># consectetur adipiscing </a>.
                    </p>
                  </div>
                </li>
                <li class="media">
                  <div class="profile-img-container pull-left">
                    <a class="add-icon"><span class="glyphicon glyphicon-plus"></span></a>
                    <img src="Assets/twitter-feed/img/2.png" alt="" class="img-circle">
                  </div>
                  <div class="media-body">
                    <span class="text-muted pull-right">
                                          <small class="text-muted">30 min ago</small>
                                      </span>
                    <strong class="text-success">@ John Doe</strong>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor <a href="#"># ipsum dolor </a>adipiscing elit.
                    </p>
                  </div>
                </li>
                <li class="media">
                  <div class="profile-img-container pull-left">
                    <a class="add-icon"><span class="glyphicon glyphicon-plus"></span></a>
                    <img src="Assets/twitter-feed/img/3.png" alt="" class="img-circle">
                  </div>
                  <div class="media-body">
                    <span class="text-muted pull-right">
                                          <small class="text-muted">30 min ago</small>
                                      </span>
                    <strong class="text-success">@ Madonae Jonisyi</strong>
                    <p>
                      Lorem ipsum dolor <a href="#"># sit amet</a> sit amet, consectetur adipiscing elit.
                    </p>
                  </div>
                </li> -->
              </ul>
              <span class="text-danger">237K users active</span>
            </div>
          </div>
        </div>
        <!-- TWEET WRAPPER END -->
      </div>
    </div>
</div>
@endsection
