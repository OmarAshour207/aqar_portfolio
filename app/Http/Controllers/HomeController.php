<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Contactus;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Visitor;
use App\Models\WebsiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function changeLanguage($language)
    {
        session()->has('lang') ? session()->forget('lang') : '';
        $language == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return redirect()->back();
    }

    public function getServices()
    {
        $subServices = Service::where('parent_id', '!=', null)->get();
        $parentServices = Service::where('parent_id', null)->get();
        $subCategory = [];
        foreach ($parentServices as $parent) {
            foreach ($subServices as $index => $sub) {
                if ($parent->id == $sub->parent_id) {
                    array_push($subCategory, [
                        $parent->id   => $sub->en_title . '-' .$sub->id
                    ]);
                }
            }
        }
        return $subCategory;
    }

    public function HomePage()
    {
        $this->checkVisitor();

        session('lang') ?? session()->put('lang', app()->getLocale());
        $websiteSettings = WebsiteSetting::first();
        $page_filter = $websiteSettings->page_filter != null ? unserialize($websiteSettings->page_filter) : '';
        $aboutUs = About::first();
        $abouts = About::limit(6)->get();
        $contactUs = Contactus::first();
        $projects = Project::orderBy('id', 'desc')->limit(12)->get();

        $services = Service::orderBy('id', 'desc')->limit(6)->get();

        $header_services = Service::where('parent_id', null)->orderBy('id', 'desc')->limit(6)->get();
        $subCategory = $this->getServices();

        $teamMembers = TeamMember::orderBy('id', 'desc')->limit(4)->get();
        $testimonials = Testimonial::orderBy('id', 'desc')->limit(3)->get();
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        $themeName = getThemeName();
        $sliders = Slider::orderBy('id', 'desc')->limit(3)->get();


        return view('site.' . $themeName . '.home',
                    compact('page_filter', 'sliders',
                            'aboutUs', 'contactUs', 'projects',
                            'services', 'teamMembers',
                            'testimonials', 'blogs',
                            'abouts', 'subCategory' , 'header_services'));
    }

    public function checkVisitor()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $page = \Request::segment(1) ?? 'home';

        $visitors = DB::table('visitors')
                ->where('ip', $ip)
                ->where('page', $page)
                ->latest()
                ->first();

        if($visitors != null) {
            $created = Carbon::parse($visitors->created_at);

            if(!$created->isCurrentDay()) {
                $this->createVisitor($ip, $page);
            }
        }else {
            $this->createVisitor($ip, $page);
        }
    }

    protected function createVisitor($ip, $page)
    {
        Visitor::create([
            'ip'    => $ip,
            'page'  => $page
        ]);
    }

    public function aboutPage()
    {
        $this->checkVisitor();
        $abouts = About::limit(6)->get();
        $aboutUs = About::first();
        $name = getThemeName();
        $projects = Project::orderBy('id', 'desc')->limit(6)->get();

        $services = Service::where('parent_id', null)->orderBy('id', 'desc')->limit(6)->get();
        $subCategory = $this->getServices();

        return view('site.' . $name . '.about',
            compact('abouts', 'projects',
                            'aboutUs', 'services',
                            'subCategory'));
    }

    public function blogsPage()
    {
        $this->checkVisitor();
        $blogs = Blog::paginate(4);

        $abouts = About::limit(6)->get();
        $services = Service::where('parent_id', null)->orderBy('id', 'desc')->limit(6)->get();
        $subCategory = $this->getServices();

        return view('site.' . getThemeName() . '.blogs',
                compact('blogs', 'services',
                                'subCategory', 'abouts'));
    }

    public function showBlog($id, $title)
    {
        $blog = Blog::findOrFail($id);
        $blogs = Blog::orderBy('id', 'desc')->limit(4)->get();
        $abouts = About::limit(6)->get();
        $services = Service::where('parent_id', null)->orderBy('id', 'desc')->limit(6)->get();
        $subCategory = $this->getServices();

        return view('site.' . getThemeName() . '.single_blog',
                compact('blog', 'services',
                                'blogs','abouts',
                                'subCategory'));
    }

    public function projectsPage()
    {
        $this->checkVisitor();
        $projects = Project::orderBy('id', 'desc')->paginate(6);
        $aboutUs = About::first();
        $abouts = About::limit(6)->get();
        $services = Service::where('parent_id', null)->orderBy('id', 'desc')->limit(6)->get();
        $subCategory = $this->getServices();

        return view('site.' . getThemeName() . '.projects',
                compact('projects', 'aboutUs',
                                'services', 'subCategory', 'abouts'));
    }

    public function servicesPage()
    {
        $this->checkVisitor();
        $name = getThemeName();
        $services = Service::orderBy('id', 'desc')->paginate(8);
        $abouts = About::limit(6)->get();
        $header_services = Service::where('parent_id', null)->orderBy('id', 'desc')->limit(6)->get();
        $subCategory = $this->getServices();

        return view('site.' . $name . '.services',
                compact('services', 'header_services',
                                'abouts', 'subCategory'));
    }

    public function SingleService($id, $title)
    {
        $service = Service::FindOrFail($id);
        $services = Service::orderBy('id', 'desc')->limit(6)->get();
        $abouts = About::limit(6)->get();
        $header_services = Service::where('parent_id', null)->orderBy('id', 'desc')->limit(6)->get();
        $subCategory = $this->getServices();
        return view('site.' . getThemeName() . '.single_service',
                compact('service', 'services',
                                'header_services', 'abouts',
                                'subCategory'));
    }

    public function contact()
    {
        $this->checkVisitor();
        $contactUs = Contactus::first();
        $aboutUs = About::first();
        $abouts = About::limit(6)->get();
        $header_services = Service::where('parent_id', null)->orderBy('id', 'desc')->limit(6)->get();
        $subCategory = $this->getServices();

        return view('site.' . getThemeName() . '.contact',
                compact('contactUs',
                                'aboutUs', 'abouts',
                                'header_services', 'subCategory'));
    }
}