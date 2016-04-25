<!-- Can be used for edit - create -->
{!! Form::open(['url' => '/departments', 'class' => 'form-horizontal']) !!}

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
        'class' => 'btn btn-success pull-right',
        'id' => 'form-add-department'
        ]) !!}
  </div>
{!! Form::close() !!}

<script type="text/javascript">
    // my custom script

    jQuery( document ).ready( function( $ ) {

        $( '#form-add-department' ).on( 'click', function() {

            alert('haha');
            //.....
            //show some spinner etc to indicate operation in progress
            //.....
            alert($( this ).prop( 'action' ));
            alert($('input[name="_token"]').val());
            $.ajax({
                url: '/departments',
                type: "post",
                data: {
                    "name": $( '#department-name' ).val(),
                    "description": $( '#department-description' ).val()
                },
                success: function(data){
                    alert(data);
                }
            });
            // $.post(
            //     $( this ).prop( 'action' ),
            //     {
            //         // "_token": $( this ).find( 'input[name=_token]' ).val(),
            //         "name": $( '#department-name' ).val(),
            //         "description": $( '#department-description' ).val()
            //     },
            //     function( data ) {
            //         console.log(data);
            //         //do something with data/response returned by server
            //     },
            //     'json'
            // );

            //.....
            //do anything else you might want to do
            //.....

            //prevent the form from actually submitting in browser
            return false;
        } );

    } );

</script>
