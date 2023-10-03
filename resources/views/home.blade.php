@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <a href = "{{ route('employee.create') }}">Create Employee</a>
                {{--  <a href = "{{ route('employee.list') }}">List Employee</a>  --}}
                
          
                
            </div>
        </div>
    </div>
</div>

@endsection
