@extends('layouts.global')

@section('title')
{{ __("surveys.title") }}
@endsection

@section('content')
<table>
    <thead>
        <tr>
            <th></th>
            @foreach ($candidates as $candidate)
                <th>{{$candidate->name}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($surveys as $survey)
        <tr>
            <th>{{ $survey->getRollingPeriod() }}</th>
            @foreach ($candidates as $candidate)
                @if( $survey->hasCandidate($candidate->id) )
                    <td>{{ $survey->getCandidate($candidate->id)->pivot->stat }}%</td>
                @else
                    <td>-</td>
                @endif
            @endforeach
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <th colspan="{{ $candidates->count() + 1 }}">{{ __("surveys.update") }}:  {{ $lastRun->updated_at }}</th>
    </tfoot>
</table>
@endsection
