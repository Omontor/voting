@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.candidate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.candidates.update", [$candidate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.candidate.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $candidate->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidate.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="creator_id">{{ trans('cruds.candidate.fields.creator') }}</label>
                <select class="form-control select2 {{ $errors->has('creator') ? 'is-invalid' : '' }}" name="creator_id" id="creator_id" required>
                    @foreach($creators as $id => $entry)
                        <option value="{{ $id }}" {{ (old('creator_id') ? old('creator_id') : $candidate->creator->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('creator'))
                    <span class="text-danger">{{ $errors->first('creator') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidate.fields.creator_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.candidate.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidate.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="month_id">{{ trans('cruds.candidate.fields.month') }}</label>
                <select class="form-control select2 {{ $errors->has('month') ? 'is-invalid' : '' }}" name="month_id" id="month_id">
                    @foreach($months as $id => $entry)
                        <option value="{{ $id }}" {{ (old('month_id') ? old('month_id') : $candidate->month->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('month'))
                    <span class="text-danger">{{ $errors->first('month') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.candidate.fields.month_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.candidates.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 8192,
      height: 8192
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($candidate) && $candidate->image)
      var file = {!! json_encode($candidate->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection