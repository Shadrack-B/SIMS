<style>
    input:read-only{
        border: none;
        border-color: transparent;
    }
</style>

<div class="table-responsive">
    <table class="table" id="semesters-table">
        <thead>
            <tr>
                <th>Semester Name</th>
        <th>Semester Duration</th>
        <th>Semester Code</th>
        <th>Semester Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($semesters as $semester)
            <tr>
                <td>{{ $semester->semester_name }}</td>
            <td>{{ $semester->semester_duration }}</td>
            <td>{{ $semester->semester_code }}</td>
            <td>{{ $semester->semester_description }}</td>
                <td>
                    {!! Form::open(['route' => ['semesters.destroy', $semester->semester_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#semester-view-modal" data-semester_id="{{ $semester->semester_id }}" data-semester_name="{{ $semester->semester_name }}" data-semester_code="{{ $semester->semester_code }}" data-semester_description="{{ $semester->semester_description }}" data-semester_duration="{{ $semester->semester_duration }}" data-created_at="{{ $semester->created_at }}" data-updated_at="{{ $semester->updated_at }}" class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-eye-open"></i>
                        <a href="{{ route('semesters.edit', [$semester->semester_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Modal start -->
<div class="modal fade" id="semester-view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="semester_id" id="semester_id">

            {{-- semester_name field --}}
            <div class="form-group">
                {!! Form::label('semester_name', 'Semester Name:') !!}
                <input type="text" name="semester_name" id="semester_name" readonly>
            </div>

            {{-- semester_code field --}}
            <div class="form-group">
                {!! Form::label('semester_code', 'Semester Code:') !!}
                <input type="text" name="semester_code" id="semester_code" readonly>
            </div>

            {{-- semester_description field --}}
            <div class="form-group">
                {!! Form::label('semester_description', 'Semester Description:') !!}
                <input type="text" name="semester_description" id="semester_description" readonly>
            </div>

            {{-- semester_duration field --}}
            <div class="form-group">
                {!! Form::label('semester_duration', 'Semester Duration:') !!}
                <input type="text" name="semester_duration" id="semester_duration" readonly>
            </div>

            {{-- created_at field --}}
            <div class="form-group">
                {!! Form::label('created_at', 'Created At:') !!}
                <input type="text" name="created_at" id="created_at" readonly>
            </div>

            {{-- updated_at field --}}
            <div class="form-group">
                {!! Form::label('updated_at', 'Updated At:') !!}
                <input type="text" name="updated_at" id="updated_at" readonly>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal end --}}

@section('scripts')
    <script>
        $('#semester-view-modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var semester_name = button.data('semester_name')
            var semester_code = button.data('semester_code')
            var semester_description = button.data('semester_description')
            var semester_duration = button.data('semester_duration')
            var created_at = button.data('created_at')
            var updated_at = button.data('updated_at')
            var semester_id = button.data('semester_id')

            var modal = $(this)

            modal.find('.modal-title').text('VIEW SEMESTER INFORMATION')
            modal.find('.modal-body #semester_name').val(semester_name)
            modal.find('.modal-body #semester_code').val(semester_code)
            modal.find('.modal-body #semester_description').val(semester_description)
            modal.find('.modal-body #semester_duration').val(semester_duration)
            modal.find('.modal-body #created_at').val(created_at)
            modal.find('.modal-body #updated_at').val(updated_at)
            modal.find('.modal-body #semester_id').val(semester_id)
        });
    </script>
    
@endsection