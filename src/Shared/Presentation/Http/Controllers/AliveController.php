<?php

namespace ArtishUp\Shared\Presentation\Http\Controllers;

class AliveController extends Controller
{

    public function alive()
    {
        return response('I am Optimus Prime, leader of the autobots.', 200);
    }
}
