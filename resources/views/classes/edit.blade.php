@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Classes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($classes, ['route' => ['classes.update', $classes->class_id], 'method' => 'patch']) !!}

                        <!-- Class Name Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('class_name', 'Class Name:') !!}
                            {!! Form::text('class_name', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Class Code Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('class_code', 'Class Code:') !!}
                            {!! Form::text('class_code', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="modal-footer">
                        {!! Form::submit('Update Class', ['class' => 'btn btn-success']) !!}
                        </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection