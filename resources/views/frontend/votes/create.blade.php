@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.vote.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.votes.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="value">{{ trans('cruds.vote.fields.value') }}</label>
                            <input class="form-control" type="number" name="value" id="value" value="{{ old('value', '0') }}" step="1" required>
                            @if($errors->has('value'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('value') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vote.fields.value_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="candidate_id">{{ trans('cruds.vote.fields.candidate') }}</label>
                            <select class="form-control select2" name="candidate_id" id="candidate_id" required>
                                @foreach($candidates as $id => $entry)
                                    <option value="{{ $id }}" {{ old('candidate_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('candidate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('candidate') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vote.fields.candidate_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user">{{ trans('cruds.vote.fields.user') }}</label>
                            <input class="form-control" type="number" name="user" id="user" value="{{ old('user', '') }}" step="1" required>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.vote.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection