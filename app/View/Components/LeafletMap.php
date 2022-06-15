<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LeafletMap extends Component
{
    public $centerpoint;
    public $markers;
    public $markerCallback;
    public $mapCallback;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($centerpoint, $markers = array(), $markerCallback = "noMarkerCallback", $mapCallback = "noMapCallback")
    {
        // $this->markers = array(count($markers));
        $this->centerpoint = explode(',', $centerpoint);

        $markerArr = array(count($markers));

        for($i = 0; $i < count($markers); $i++) {
            $latlong = explode(",", $markers[$i]->gps_location);
            $markerArr[$i] = array(
                'lat' => $latlong[0],
                'long' => $latlong[1],
            );

            if(isset($markers[$i]->id)) {
                $markerArr[$i]['id'] = $markers[$i]->id;
            }

            if(isset($markers[$i]->team_hash)) {
                $markerArr[$i]['team_hash'] = $markers[$i]->team_hash;
            }
        }
        
        $this->markers = $markerArr;
        if(isset($markerCallback)){
            $this->markerCallback = $markerCallback;
        }

        if(isset($mapCallback)){
            $this->mapCallback = $mapCallback;
        }
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.leaflet-map');
    }
}
