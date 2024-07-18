<?php

namespace App\Http\Controllers\Sholikin\Holiday;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{
    public function getHolidays()
    {
        $holidays = [];
        $year = Carbon::now('Asia/Jakarta')->format('Y');
        $year2 = Carbon::parse($year)->addYear(3)->format('Y');
        for($year; $year <= $year2; $year++)
        {
            $rs = $this->getHolidaysYear($year);
            if(!empty($rs))
            {
                $holidays[$year] = $rs;
            }
        }
        return response()->json([
            'status' => 'success',
            'holidays' => $holidays
        ]);
    }

    private function getHolidaysYear($year)
    {
        $client = new Client();
        $url = "https://api-harilibur.vercel.app/api?year={$year}";

        try {
            $response = $client->get($url);
            $data = json_decode($response->getBody()->getContents(),true);
            $arrDateHolday = [];
            $no = -1;
            if(!empty($data))
            {
                foreach($data as $key => $item)
                {
                    if($item['is_national_holiday'])
                {
                        $no++;
                        $arrDateHolday[$no]['date'] = $item['holiday_date'];
                        $arrDateHolday[$no]['name'] = $item['holiday_name'];
                    }
                    
                }

                $chekdulu = DB::table('holidays')->where('year', $year)->get();
                
                if($chekdulu->isEmpty())
                {
                    foreach($arrDateHolday as $keyDate => $keyItem)
                    {
                        DB::table('holidays')->insert([
                            'year' => $year,
                            'date' => $keyItem['date'],
                            'name' => $keyItem['name'],
                            'created_at' => Carbon::now()->toDateTimeString(),  
                        ]);
                    }
                }
            }
            

            return $arrDateHolday;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
