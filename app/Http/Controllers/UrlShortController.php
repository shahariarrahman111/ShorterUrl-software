<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

use function PHPUnit\Framework\throwException;

class UrlShortController extends Controller
{

    public function createShortUrl(Request $request){
        
        try{

            // dd($request->all());

            $request->validate([
                'big_url' => 'required|url'
            ]);
    
            $user = User::where('id', Auth::id())->first();

            $bigUrl = $request->input('big_url');
            // dd($bigUrl);


    
            // Random url create
            $shortUrl = Str::random(6);
            // $smallUrl = url('/'. $shortUrl);
    
            //  Store All url
            $url = Url::create([
                'user_id' => $user->id,
                'big_url' => $bigUrl,
                'small_url' => $shortUrl,
                'count_click' => 0
            ]);
    
    
            if (!$url){
                // return response()->json(['message' => 'Url not created']);
                throw new Exception('Url not created');
            }
            // return redirect()->route('home');
            return redirect()->back();


        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }


    }



    public function redirectToBigUrl ($shortUrl){

        $url = Url::where('small_url', $shortUrl)->first();

        if (!$url){

            return redirect()->route('home.page')->with('error', 'Short URL not found!');
        }

        // Count clicking small url
        $url->increment('count_click');
        $url->refresh();

        // Return big url
        return Redirect::to($url->big_url);
    }


    
    public function showDashboard(Request $request)
    {

        $urls = Url::where('user_id', Auth::id())->get();


        // Pagination configure
        $perPage = 10; 
        $currentPage = $request->get('page', 1); 

        
        $paginatedUrls = collect($urls)->forPage($currentPage, $perPage);

        // Pagination link
        $totalUrls = $urls->count();
        $totalPages = ceil($totalUrls / $perPage);

        // Return view
        return view('pages.dashboard', [
            'paginatedUrls' => $paginatedUrls,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage
        ]);
    }




}    