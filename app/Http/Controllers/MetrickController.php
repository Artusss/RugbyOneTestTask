<?php

namespace App\Http\Controllers;

use App\Metrick;
use App\Charts\MetrickChart;
use Illuminate\Http\Request;

class MetrickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metricks = Metrick::paginate(10);
        return view("metricks.index", array(
            "site_slug" => "For all sites",
            "metricks" => $metricks
        ));
    }

    /**
     * Display a listing of current resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSite($site)
    {
        $metricks = Metrick::where("site", $site)
            ->paginate(10);
        return view("metricks.index", array(
            "site_slug" => "For " . $site,
            "metricks" => $metricks
        ));
    }

    /**
     * Show graph of metrick statistic.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStat()
    {
        $metricks = Metrick::all();
        
        $prepared_params = $this->prepareGraphParams($metricks);

        $metrickChart = new MetrickChart;
        $metrickChart->labels($prepared_params["mostPickedTimePeriod_labels"]);
        $metrickChart->dataset('Metricks by day hours (all sites)', 'line', $prepared_params["mostPickedTimePeriod"]);

        return view('metricks.stat', array(
            "metrickChart" => $metrickChart
        ));
    }

    /**
     * Show graph of metrick statistic for current site.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSiteStat($site)
    {
        $metricks = Metrick::where("site", $site)
            ->get();
        
        $prepared_params = $this->prepareGraphParams($metricks);

        $metrickChart = new MetrickChart;
        $metrickChart->labels($prepared_params["mostPickedTimePeriod_labels"]);
        $metrickChart->dataset('Metricks by day hours (' . $site . ')', 'line', $prepared_params["mostPickedTimePeriod"]);

        return view('metricks.stat', array(
            "metrickChart" => $metrickChart
        ));
    }

    // PREPARE PARAMS FOR GRAPH
    private function prepareGraphParams($metricks)
    {
        $mostPickedTimePeriod_labels = array();
        $mostPickedTimePeriod_raw    = array();
        // $mostPickedDistribution      = array();
        for($i = 0; $i < 24; $i++)
        {
            $mostPickedTimePeriod_labels[] = count($i) < 10 ? "0{$i}:00" : "{$i}:00";
            $mostPickedTimePeriod_raw[$i] = array();
        }
        foreach($metricks as $metrick)
        {
            $mostPickedTimePeriod_raw[$metrick->hour][] = $metrick->id;
            // $mostPickedDistribution[] = array(
            //     "X" => $metrick->clientX,
            //     "Y" => $metrick->clientY
            // );
        }
        $mostPickedTimePeriod = array();
        foreach($mostPickedTimePeriod_raw as $hour => $period)
        {
            $mostPickedTimePeriod[$hour] = count($period);
        }
        return array(
            "mostPickedTimePeriod"        => $mostPickedTimePeriod,
            "mostPickedTimePeriod_labels" => $mostPickedTimePeriod_labels,
            // "mostPickedDistribution"      => $mostPickedDistribution,
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $metrick = new Metrick;
        //json_decode(file_get_contents('php://input'), true);
        $goodRequest = json_decode($request->getContent());
        $metrick->site = $goodRequest->site;
        $metrick->clientX = $goodRequest->clientX;
        $metrick->clientY = $goodRequest->clientY;
        $metrick->date = $goodRequest->date;
        $metrick->hour = $goodRequest->hour;
        $metrick->save();
        //$goodRequest = json_decode($request->all(), true);
        //$metrick = Metrick::create($goodRequest);
        return response()->json($metrick, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Metrick  $metrick
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metrick = Metrick::findOrFail($id);
        return response()->json($metrick, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Metrick  $metrick
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $metrick = Metrick::findOrFail($id);
        $metrick->delete();
        return response()->json(null, 204);
    }
}
