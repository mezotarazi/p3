@extends('layouts.master')

@section('title')
    RMR Calculator
@endsection

@section('header')
    <h2>Resting Metabolic Rate (RMR) Calculator</h2>
    <p>This Calculator is based on Mifflin St. Jeor Algorithm to derive calorie requirement per day</p>
@endsection
@section('content')
    @php ($activity_array = array('1.0' => 'Minimal','1.2' => 'Inactive','1.376' => 'Light', '1.55' => 'Moderate','1.725' => 'Heavy', '1.9' => 'Athlete'))
    @php ($height_array = array('55' => '4ft 7in','56' => '4 ft. 8 in.','57' => '4 ft. 9 in.','58' => '4 ft. 10 in.','59' => '4 ft. 11 in.','60' => '5 ft. 0 in.','61' => '5 ft. 1 in.','62' => '5 ft. 2 in.',
    '63' => '5 ft. 3 in.','64' => '5 ft. 4 in.','65' => '5 ft. 5 in.','66' => '5 ft. 6 in.','67' => '5 ft. 7 in.','68' => '5 ft. 8 in.','69' => '5 ft. 9 in.','70' => '5 ft. 10 in.','71' => '5 ft. 11 in.',
    '72' => '6 ft. 0 in.','73' => '6 ft. 1 in.','74' => '6 ft. 2 in.','75' => '6 ft. 3 in.','76' => '6 ft. 4 in.','77' => '6 ft. 5 in.','78' => '6 ft. 6 in.','79' => '6 ft. 7 in.','80' => '6 ft. 8 in.',
    '81' => '6 ft. 9 in.','82' => '6 ft. 10 in.','83' => '6 ft. 11 in.','84' => '7 ft. 0 in.')
    )
    <div class="container">

        <div class="jumbotron">
            <div class="result">
                    @if(count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="get" action="/results">
                        {{ csrf_field() }}
                        <input type="hidden" name="measure" value="imperial">

                        <table>

                            <tr>
                                <td class="col1">Gender</td>
                                <td>
                                    <label><input type="radio" name="gender" id="male" value="male" checked> Male&nbsp;</label>
                                    <label><input type="radio" name="gender" id="female" value="female"> Female</label>
                                </td>
                            </tr>

                            <tr>
                                <td class="col1"><label for="age">Age</label></td>
                                <td>
                                    <input type="text" name="age"  id="age" style="width:60px;" maxlength="3" value='{{ old('age') }}'>
                                </td>
                            </tr>

                            <tr>
                                <td class="col1"><label for="weight">Weight</label></td>
                                <td><input type="text" name="weight"  id="weight" placeholder="lbs" style="width:60px;" maxlength="3" value='{{ old('weight') }}'></td>
                            </tr>

                            <tr>
                                <td class="col1"><label for="height">Height</label></td>
                                <td>
                                    <select name="height">
                                        <option value="">Select</option>
                                        @foreach($height_array as $type => $value))
                                            <option value="{{ $type }}" {{ (old('height', $height_array ?? '') == $type) ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td class="col1">Activity</td>
                                <td>
                                    <select name="activity">
                                        <option value="">Select</option>
                                        @foreach($activity_array as $type => $value)
                                            <option value="{{ $type }}" {{ (old('activity', $activity_array ?? '') == $type) ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>




                            <tr style="margin-top:15px;">
                                <td class="col1">&nbsp;</td>
                                <td><input type="submit" class="btn btn-submit btn-lg" id="submit" name="submit" value="Calculate!"></td>
                            </tr>

                        </table>

                    </form>
            </div><!-- end results -->
        </div><!-- end jumboton -->
    </div><!-- end container -->

@endsection

@section('footer')

        <h6>All rights reserved</h6>

                    <div class="site-info">
                        <a href="http://p3.rameztarazi.me">p3.rameztarazi.me</a>
                    </div><!-- .site-info -->
@endsection
