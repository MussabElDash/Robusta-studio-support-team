@extends('departments.shared')

@section('content')
    <div class="" style="margin-left: 5%">
        {!! Form::open([
            'route' => ['departments.update', $department['slug']],
            'method' => 'put',
            'class' => 'form-horizontal'
            ]) !!}
        <div clas="row" style="margin-top:5%">
            {!! Form::submit('Save changes', [
                'class' => 'btn btn-info btn-md'
                ]) !!}
                    <!-- <button id="saveButton" class="btn btn-lg btn-warning">Save changes</button> -->
        </div>
        <div class="row" style="margin-top:5%">
            <div class="col-md-9">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="">Name</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <blockquote>
                            {!! Form::text('name', $department['name'], [
                                'class' => 'form-control',
                                'style' => 'font-size: 20px',
                                'placeholder' => $department['name'],
                                'id' => 'department-name'
                            ]) !!}
                        </blockquote>
                    </div>
                    <div class="box-header with-border">
                        <h3>Description</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <blockquote>
                            {!! Form::text('description', $department['description'], [
                                'class' => 'form-control',
                                'style' => 'font-size: 20px',
                                'placeholder' => $department['description'],
                                'id' => 'department-description'
                            ]) !!}
                        </blockquote>
                    </div>

                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
