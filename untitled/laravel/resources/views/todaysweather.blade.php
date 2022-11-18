<!DOCTYPE html>
<html>
<title>
    Weather cast API - 1 Day of Daily Forecasts
</title>
<link rel="stylesheet" href="/app.css">

<body>
<div>
    <h1>Weather cast API - 1 Day of Daily Forecasts (But only for New York) </h1>
    <hr>
    <div class="attributes">
        The date: {{$date[0]}}
        <br>
        Today's forecast is: {{$text[0]}}
        <br>
        The weather category is: {{$category[0]}}
        <br>
        The minimum temperature for today is: {{$tempMin[0]}} Fahrenheit
        <br>
        The maximum temperature for today is: {{$tempMax[0]}} Fahrenheit
    </div>
    <hr>
    <div class="weatherlettter">
        <form method="post" name="emailForm" action="{{route('subscribe')}}">
            @csrf
            <label for="email" class="form-label">Email:</label>
            <input id="email" type="email" name="email" placeholder="your@email.com">

            <input type="hidden" name="message" id="message" value="
            The date: {{$date[0]}}
            Today's forecast is: {{$text[0]}}
            The weather category is: {{$category[0]}}
            The minimum temperature for today is: {{$tempMin[0]}} Fahrenheit
            The maximum temperature for today is: {{$tempMax[0]}} Fahrenheit">

            <button type="submit" class="register-submit" id="register-submit"> Click here to subscribe to the
                forecast
            </button>
        </form>
    </div>
    <hr>
    <a href="/"> Click here to go back</a>
</div>
</body>
</html>
