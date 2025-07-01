<?php

namespace App\Http\Controllers;

use App\Services\Jkt48ScraperService;
use Illuminate\Http\Request;

class NewsScraperController extends Controller
{
    protected Jkt48ScraperService $scraper;

    public function __construct(Jkt48ScraperService $scraper)
    {
        $this->scraper = $scraper;
    }

    public function view()
    {
        $data = $this->scraper->getAllNews();
        return view('user.dashboard', ['newsList' => $data]);
    }

}
