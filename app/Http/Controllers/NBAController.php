<?php

namespace App\Http\Controllers;
use App\PlayerTotal;
use App\Roster;
use App\Team;

use Illuminate\Http\Request;

class NBAController extends Controller
{
    public function index(){
        $playerTotal = Roster::orderBy('name','Asc')->get();
        return view('nba', compact('playerTotal'));
    }

    public function exportCSV(Request $request){

        // filter here from form 

        $playerTotal = Roster::orderBy('name','Asc')->get();
        $fileName = 'player.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Name', 'number', 'pos', 'height', 'weight','dob','nationality','years exp','college',
         'age', 'games','age', 'games started', 'minutes played', 'field goals', 'field goals attempted', 
         'free throws', 'free throws attempted', 'offensive rebounds', 'defensive rebounds','assists', 'steals', 'blocks', 'personal fouls',
        'turn over');

        $callback = function() use($playerTotal, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($playerTotal as $i) {
                $row['Name']  = $i->name;
                $row['number']    = $i->number;
                $row['pos']    = $i->pos;
                $row['height']  = $i->height;
                $row['weight']  = $i->weight;
                $row['dob']  = $i->dob;
                $row['weight']  = $i->end_at;

                fputcsv($file, array($row['Name'], $row['number'], $row['pos'], $row['height'], $row['weight']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);

    }
}
