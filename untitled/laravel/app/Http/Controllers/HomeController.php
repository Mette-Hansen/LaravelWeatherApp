<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    public function show()
    {
        //This is very hardcoded and can only show for new york,
        // I had a lot of trouble with the api key authorization but this way works
        $apiURL = 'http://dataservice.accuweather.com/forecasts/v1/daily/1day/349727?apikey=IZanYutktmV6LWH5ehjAP5PyxZEKusZr';
//        $postInput = [
//            'language' => 'en-us',
//            'details' => 'false',
//            'metric' => 'false'
//        ];
        //$client = new \GuzzleHttp\Client();
        //$response = $client->request('GET', $apiURL, ['form_params' => $postInput]);
        //$statusCode = $response->getStatusCode();
        //Fetches the data from the api in json
        $json_data = file_get_contents($apiURL);
        $jsonobj = (json_decode($json_data, false, 6));
        //dd($jsonobj);

        //Splits the jsonObjects into variables for further manipulation.
        $text = collect($jsonobj->Headline->Text); //Text value
        $category = collect($jsonobj->Headline->Category); //Category value
        $date = collect($jsonobj->DailyForecasts[0]->Date); //Date
        $tempMin = collect($jsonobj->DailyForecasts[0]->Temperature->Minimum->Value);
        $tempMax = collect($jsonobj->DailyForecasts[0]->Temperature->Maximum->Value);
//        $collection= collect($json_data);
//        $texts = $collection->filter()->pluck("Text");
//        $categories = $collection->unique('Category');
        //return response()->json($values);
        return view('todaysweather', [
            'text' => $text,
            'category' => $category,
            'date' => $date,
            'tempMin' => $tempMin,
            'tempMax' => $tempMax
        ]);
    }

    public function store()
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);
        Mail::to(config('mail.from.address'))->send(new SendMail(request('email'), request('message')));
        return redirect()->back();
    }


}
