@extends('layouts.home')

@section('content_header')
    <h1>
      Departments <small>{{$department['name']}}</small>
    </h1>
    <ol class="breadcrumb">
      <li>
          <a href="#"><i class="fa fa-dashboard"></i> Home</a>
      </li>
      <li class="active">Departments</li>
    </ol>
@endsection

@section('content')
<div class="">
    <div clas="row" style="margin-top:5%">
        <button class="btn btn-lg btn-warning"><a href="/departments/{{$department['slug']}}/edit" style="color:white">Edit department</a></button>
    </div>
    <div class="row" style="margin-top:5%">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Comments</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Agents Count</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
          </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="">Name</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <blockquote>
                    <p>{{$department['name'] == '' ? 'No description yet' : $department['name']}}</p>
                  </blockquote>
                </div>
                <div class="box-header with-border">
                  <h3 >Description</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <blockquote>
                    <p>{{$department['description'] == '' ? 'No description yet' : $department['description']}}</p>
                  </blockquote>
                </div>
                <!-- /.box-body -->
          </div>
        </div>
    </div>
</div>
@endsection
