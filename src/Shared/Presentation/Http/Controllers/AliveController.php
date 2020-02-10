<?php

namespace ArtishUp\Shared\Presentation\Http\Controllers;

class AliveController extends Controller
{

    public function alive()
    {
        return response('Are you username: LadiesMan217?!', 200);
    }
}
