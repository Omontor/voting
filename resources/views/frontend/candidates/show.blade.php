@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.candidate.title') }}
                </div>

                <div class="card-body">


                    <div>
                        <td>
                            @if($candidate->image)
                                <a href="{{ $candidate->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $candidate->image->getUrl()}}" style="width:80%">
                                </a>
                            @endif
                        </td>
                    </div>
                    <br>
                    <div class="form-group">

                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidate.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $candidate->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidate.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $candidate->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidate.fields.creator') }}
                                    </th>
                                    <td>
                                        {{ $candidate->creator->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidate.fields.image') }}
                                    </th>
                                  
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.candidate.fields.month') }}
                                    </th>
                                    <td>
                                        {{ $candidate->month->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection