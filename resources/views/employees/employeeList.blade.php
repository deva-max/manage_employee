@extends('layouts.app')
@section('content')
    <a href = "{{ route('employee.create') }}">Create Employee</a>
        
        <h3>Employees</h3>
        @foreach ($employeeData as $data)
            <label>Name:</label>
            <span>{{ $data['employee']->name }}</span>
            <label>Gender:</label>
            <span>{{ $data['employee']->gender }}</span>
            <label>Date of Birth:</label>
            <span>{{ $data['employee']->dob }}</span>
            <label>Employment Type:</label>
            <span>{{ $data['employee']->employment_type }}</span>
            <label>Qualification:</label>
            <span>{{ $data['employee']->title }}</span>
        @endforeach
@endsection
        