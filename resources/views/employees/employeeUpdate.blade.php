@extends(layouts.app)
@section(content)
    <h3>Create Employee</h3>
        <form type='post' action="{{route=()}}">
        @csrf
        {{method_field('PUT')}}
            <label for='name'>Name</label>
            <input type="text" value='{{}}' name = "name" required />
            <label for='name'>Date of Birth</label>
            <input type="text" value="" name = "dob"/>
            <label for='name'>Gender</label>
            <input type="radio" name = "gender" value="male"/>
            <input type="radio" name = "gender" value="female"/>

            <label for='qualifications'>Qualifications</label>
            <input type="checkbox" name = "qualifications" value=""/>
            <input type="checkbox" name = "qualifications" value=""/>

            <label for="employmenttype">Employment Type</label>
            <select name="employment-type">
                <option disabled>select an below option<opiton>
                <option value="permanent">Permanent</option>
                <option value="temprovery">Temprovery</option>
            </selct>

        </form>
@endsection