@extends('layouts.frontend')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <center>
                            <div style="object-fit: cover; max-width:500px;"> 
                                <img src="{{$candidate->image->getUrl()}}" alt="" class="img-fluid">

                            </div>

                        <hr>
                        <div style="width:70%">

                             <form method="POST" action="{{ route("frontend.votes.store") }}" enctype="multipart/form-data">
                                @method('POST')
                                @csrf

                                <div class="form-group">
                                    <label for="customRange1">Valor 1 - 10</label>
                                    <input type="range" class="custom-range" id="customRange1" min="1" max="10" step="1" id="customRange3" value="1" name="value">
                                 </div>

                                <div class="form-group">
                                    <input class="form-control" type="number" name="candidate_id" id="value" value="{{ $candidate->id }}" step="1" required hidden>

                                    @if($errors->has('candidate'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('candidate') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vote.fields.candidate_helper') }}</span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="number" name="user_id" id="user" value="{{ auth()->user()->id }}" step="1" required hidden>
                                    @if($errors->has('user'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('user') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vote.fields.user_helper') }}</span>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">
                                        {{ trans('global.save') }}
                                    </button>
                                </div>
                            </form>                        </div>
                        <br>
                        
                        </center>
                    </div>
                    <div class="col-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--
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
--}}
@endsection