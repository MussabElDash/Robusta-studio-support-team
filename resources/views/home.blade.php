@extends('layouts.home')

@section('content_header')
    <h1>
        Feed
        <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/home"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li class="active">Feed</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-m-offset-1 col-sm-10 col-sm-offset-1">
            <!-- TWEET WRAPPER START -->
            <div class="twt-wrapper">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        @company feed
                    </div>
                    <div class="panel-body">
                        <textarea class="form-control" placeholder="Enter here for tweet..." rows="3"></textarea>
                        <br/>
                        <a href="#" class="btn btn-primary btn-sm pull-right">Tweet</a>
                        <div class="clearfix"></div>
                        <hr/>
                        <ul class="media-list">
                            @foreach ($tweets as $tweet)
                                {{--we can just hide tweets that already have tickets--}}
                                {{--@if(DB::table('tickets')->where('tweet_id','=',$tweet['id'])->exists())--}}
                                    {{--@continue--}}
                                {{--@endif--}}
                                <li class="media">
                                    <div class="profile-img-container pull-left">
                                        <button type="button" class="btn btn-info fa fa-ticket"
                                                data-toggle="modal"
                                                data-target="#create-ticket-from-feed-modal"
                                                data-customer-twitter-id="{{$tweet['user']['id']}}"
                                                data-customer-profile-image-path="{{$tweet['user']['profile_image_url']}}"
                                                data-customer-name="{{$tweet['user']['screen_name']}}"
                                                data-tweet-text="{{$tweet['text']}}"
                                                data-tweet-id="{{$tweet['id']}}"
                                                id="{{$tweet['id']}}"
                                                {{(DB::table('tickets')->where('tweet_id','=',$tweet['id'])->exists())?'disabled':''}}>
                                        </button>
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
                        </ul>
                        <span class="text-danger">237K users active</span>
                    </div>
                </div>
            </div>
            <!-- TWEET WRAPPER END -->
        </div>
    </div>
@endsection
