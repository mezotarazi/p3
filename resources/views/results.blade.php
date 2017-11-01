@extends('layouts.master')

@section('title')
    Your Results
@endsection

@section('header')
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <h2>Resting Metabolic Rate (RMR) Calculator</h2>
    <p>This Calculator is based on Mifflin St. Jeor Algorithm to calculate Calorie intake</p>
@endsection
@section('content')

    @php ($activity_array = array('1.0' => 'Minimal','1.2' => 'Inactive','1.376' => 'Light', '1.55' => 'Moderate','1.725' => 'Heavy', '1.9' => 'Athlete'))
    @php ($calories = Mifflin($_GET['measure'],$_GET['gender'],$_GET['weight'],$_GET['height'],$_GET['age'],$_GET['activity']))

    @php ($BMI = round(BMI($_GET['measure'],$_GET['weight'],$_GET['height']),2))


    <div class="container">

        <div class="jumbotron">
            <div class="result">
                   <p>You are a <strong>{{ app('request')->input('age') }}</strong> year old
                       <strong>{{ app('request')->input('gender') }}</strong> who is
                           @php ($feet = floor($_GET['height']/12))
                           @php ($inches = $_GET['height']%12)
                       <strong>{{ $feet }} feet {{ $inches }} inches </strong> tall
                       while doing <strong>{{ $activity_array[app('request')->input('activity')] }}</strong> activity per week
                   </p>

                    <div class="row">
                        <div class="col-sm-4" style="padding-left:0;">
                            <p class="bold text-center">Your Maintenance Calories</p>
                            <div id="tdee-cals">
                                <div style="padding-top:25px;">
                                    <span class="h2">{{$calories}}</span>
                                    <br>
                                    <span class="cals">calories per day</span>
                                </div>
                                <hr>
                                <div>
                                    <span class="h2">{{$calories*7}}</span>
                                    <br>
                                    <span class="cals">calories per week</span>
                                </div>
                            </div>
                        </div>



                    <div class="col-sm-8" style="padding-top:60px;">

                        <table class="table table-condensed" id="bmr-table" style="margin-bottom:10px;">
                            <?php
                            foreach ($activity_array as $key => &$val){
                                if ($calories == Mifflin($_GET['measure'],$_GET['gender'],$_GET['weight'],$_GET['height'],$_GET['age'], $key)) {
                                    echo '<tr class="success2"><td>' . $val . '</td>';
                                }
                                else echo '<tr><td>' . $val . '</td>';
                                echo'<td>'.Mifflin($_GET['measure'],$_GET['gender'],$_GET['weight'],$_GET['height'],$_GET['age'], $key).'<small> calories per day </small></td></tr>';
                            }
                            ?>
                        </table>
                    </div> <!-- end col-sm-8 -->
                    </div>
                    </br>

                    <div class="row">

                        <div class="col-sm-6" style="padding-left:0;">

                            <h2>Your Weight:
                                {{ app('request')->input('weight')}} lbs
                            </h2>
                            <p>Your ideal body weight should be between:
                                <?php echo round(BMI_Assess($_GET['measure'],$_GET['height'],0),0);
                                echo " - ".round(BMI_Assess($_GET['measure'],$_GET['height'],1),0);?>
                                lbs
                            </p>
                        </div>

                        <div class="col-sm-6 " style="padding-right:0;">
                            <h2>BMI Score: {{$BMI}} </h2>
                            <p>Your <strong>BMI</strong> is <strong>{{$BMI}}</strong>, which means you are classified as <strong>{{BMI_Class($BMI)}}</strong>
                        </div>
                    </div>
            </div><!-- end results -->
        </div><!-- end jumboton -->
    </div><!-- end container -->


   <a href="http://p3.rameztarazi.me/">Go To Home Page</a>
@endsection
@section('footer')

   <h6>All rights reserved</h6>

           <div class="site-info">
               <a href="http://p3.rameztarazi.me">p3.rameztarazi.me</a>
           </div><!-- .site-info -->

@endsection
