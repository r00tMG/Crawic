<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCommentRequest;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\DomainPending;


class HomeController extends Controller
{
    
    public function index()
    {
        
        return view('front.home');
    }

    public function cart()
    {
        return view('front.cart');
    }


    public function seo(){
    	return view('front.seo');
    }
	public function learn(){
		
		return view('front.learn');
	}
	public function blog(Request $request){
		$page  = $request->page ?? 0;
		$blogs = \App\Models\Blog::orderBy('id','desc')->skip($page)->take(10)->get();
		$total = \App\Models\Blog::orderBy('id','desc')->count();

		if ($request->cat) {
			$blogs = \App\Models\Blog::where('blog_category_id',$request->cat)->orderBy('id','desc')->skip($page)->take(10)->get();
			$total = \App\Models\Blog::where('blog_category_id',$request->cat)->orderBy('id','desc')->count();
		}

		if ($request->s) {
			$blogs = \App\Models\Blog::where('title','LIKE','%'.$request->s.'%')->orderBy('id','desc')->skip($page)->take(10)->get();
			$total = \App\Models\Blog::where('title','LIKE','%'.$request->s.'%')->orderBy('id','desc')->count();
		}

		return view('front.blog', compact('blogs','total'));
	}
	public function blog_detail(Request $request,$blog){
		$blog = \App\Models\Blog::where('slug', $blog)->first();
		return view('front.blog_detail', compact('blog'));
	}


	public function about(){
		return view('front.about');
	}
	public function contact(){
		return view('front.contact');
	}


	public function keyword_research(){
		return view('front.services.keyword_research');
	}
	public function competitive_research(){
		return view('front.services.competitive_research');
	}
	public function link_research(){
		return view('front.services.link_research');
	}
	public function rank_tracking(){
		return view('front.services.rank_tracking');
	}
	public function domain_overview(){
		return view('front.services.domain_overview');
	}
	public function site_crawl(){
		return view('front.services.site_crawl');
	}

	public function services(){
		return view('front.services.services');
	}

	public function stats(){
		return view('front.stats');
	}

	public function moz_local(){
		return view('front.moz-local');
	}
	

	public function mozapi(){
		return view('front.mozapi');
	}

	public function domain_age(){
		return view('front.tools.domain_age');
	}

	public function domain_whois(){
		return view('front.tools.domain_whois');
	}

	public function domain_global_rank(){
		return view('front.tools.domain_global_rank');
	}

	public function domain_google_bing_rank(){
		return view('front.tools.domain_google_bing_rank');
	}

	
	public function domain_authority(){
		return view('front.tools.domain_authority');
	}
	

	public function domain_audit(){
		return view('front.tools.domain_audit');
	}
	

	public function domain_backlinks(){
		return view('front.tools.domain_backlinks');
	}

	public function domain_owner(){
		return view('front.tools.domain_owner');
	}

	public function domain_expiry(){
		return view('front.tools.domain_expiry');
	}

	public function team(){
		return view('front.team');
	}
	

    
}
