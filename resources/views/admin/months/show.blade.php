@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.month.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.months.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.month.fields.id') }}
                        </th>
                        <td>
                            {{ $month->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.month.fields.name') }}
                        </th>
                        <td>
                            {{ $month->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.months.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#month_candidates" role="tab" data-toggle="tab">
                {{ trans('cruds.candidate.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="month_candidates">
            @includeIf('admin.months.relationships.monthCandidates', ['candidates' => $month->monthCandidates])
        </div>
    </div>
</div>

@endsection