@extends('layouts.master')

@section('title')
    RMR Calculator
@endsection

@section('header')
    <h2>Resting Metabolic Rate (RMR) Calculator</h2>
    <p>This Calculator is based on Mifflin St. Jeor Algorithm to calculate Calorie intake</p>
@endsection
@section('content')
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
                                    <input type="text" name="age"  id="age" style="width:60px;" maxlength="3" value="">
                                </td>
                            </tr>

                            <tr>
                                <td class="col1"><label for="weight">Weight</label></td>
                                <td><input type="text" name="weight"  id="weight" placeholder="lbs" style="width:60px;" maxlength="3" value=""></td>
                            </tr>

                            <tr>
                                <td class="col1"><label for="height">Height</label></td>
                                <td>
                                    <select name="height"  id="height" style="width:100px;">
                                        <option value="55">4ft 7in</option>
                                        <option value="56">4ft 8in</option>
                                        <option value="57">4ft 9in</option>
                                        <option value="58">4ft 10in</option>
                                        <option value="59">4ft 11in</option>
                                        <option value="60">5ft 0in</option>
                                        <option value="61">5ft 1in</option>
                                        <option value="62">5ft 2in</option>
                                        <option value="63">5ft 3in</option>
                                        <option value="64">5ft 4in</option>
                                        <option value="65">5ft 5in</option>
                                        <option value="66">5ft 6in</option>
                                        <option value="67">5ft 7in</option>
                                        <option value="68">5ft 8in</option>
                                        <option value="69">5ft 9in</option>
                                        <option value="70" selected>5ft 10in</option>
                                        <option value="71">5ft 11in</option>
                                        <option value="72">6ft 0in</option>
                                        <option value="73">6ft 1in</option>
                                        <option value="74">6ft 2in</option>
                                        <option value="75">6ft 3in</option>
                                        <option value="76">6ft 4in</option>
                                        <option value="77">6ft 5in</option>
                                        <option value="78">6ft 6in</option>
                                        <option value="79">6ft 7in</option>
                                        <option value="80">6ft 8in</option>
                                        <option value="81">6ft 9in</option>
                                        <option value="82">6ft 10in</option>
                                        <option value="83">6ft 11in</option>
                                        <option value="84">7ft 0in</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td class="col1">Activity</td>
                                <td>
                                    <select name="activity"  style="width:200px;">
                                        <option value="1.2" selected>Inactive</option>
                                        <option value="1.375">Light Exercise (1-2 days/week)</option>
                                        <option value="1.55">Moderate Exercise (3-5 days/week)</option>
                                        <option value="1.725">Heavy Exercise (6-7 days/week)</option>
                                        <option value="1.9">Athlete (2x per day) </option>
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
