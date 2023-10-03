@extends('layouts.app')
@section('content')
    <div class="w-full max-w-xs">
        <h3>Create Employee</h3>
            <form method ="POST" action="{{ route('employee.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf 
                <div class="mb-4">  
                    <label class="block text-gray-700 text-sm font-bold mb-2" for='name'>Name</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="" name = "name" required />
                </div>
                
                <div class="mb-4"> 
                    <label for='name'>Date of Birth</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" value="" name = "dob"/>
                </div>

                <div class="mb-4"> 
                    <label for='name'>Gender</label>
                    <input type="radio" name = "gender" value="male" >Male</input>
                    <input type="radio" name = "gender" value="female">Female</input>
                </div>

                <div class="mb-4"> 
                    <label for='qualifications'>Qualifications</label>
                    @foreach ($qualifications as $qualification)
                        <input type="checkbox" name = "qualifications[]" value="{{ $qualification->title }}">{{ $qualification->title }}</input>
                    @endforeach
                </div>
                
                <div class="mb-4"> 
                    <label for="employmenttype">Employment Type</label>
                    <select name="employment-type">
                        <option disabled>select an below option<option>
                        <option value="permanent">Permanent</option>
                        <option value="temprovery">Temprovery</option>
                    </selct>
                </div>

                <div class="mb-4"> 
                    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value= "submit"/>
                </div>
            </form>
    </div>
@endsection