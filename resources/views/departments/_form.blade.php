<!-- Can be used for edit - create -->
{!! Form::open([
    'url' => '/departments',
    'id' => 'form-add-department',
    'class' => 'form-horizontal'
    ]) !!}

  <div class="box-body">
    <div class="form-group">
      {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::text('name', null, [
            'class' => 'form-control',
            'placeholder' => 'Name',
            'id' => 'department-name',
            'required' => true,
        ]) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::textarea('description', null, [
            'class' => 'form-control',
            'rows' => '3',
            'placeholder' => 'Description',
            'id' => 'department-description'
        ]) !!}
      </div>
    </div>

  </div>

  <div class="box-footer">
    {!! Form::submit('Submit', [
        'class' => 'btn btn-success pull-right'
        ]) !!}
  </div>
{!! Form::close() !!}

<script type="text/javascript">
    jQuery( document ).ready( function( $ ) {
        $( '#form-add-department' ).on( 'submit', function() {
            //.....
            //show some spinner etc to indicate operation in progress
            //.....
            $.ajax({
                url: '/departments',
                type: "post",
                data: {
                    "name": $( '#department-name' ).val(),
                    "description": $( '#department-description' ).val()
                },
                success: function(data){
                    console.log(data);
                    $('.modal').modal('hide')
                },
                error: function(err) {
                    console.log(err);
                }
            });
            //prevent the form from actually submitting in browser
            return false;
        } );

    } );
</script>
