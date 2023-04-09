<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $load = $parser->setLink("https://rss.nytimes.com/services/xml/rss/nyt/Music.xml")
            ->getParseData();
        dd($load);
    }
}
