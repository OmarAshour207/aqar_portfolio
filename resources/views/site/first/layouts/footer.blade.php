<!-- start footer section -->
<footer class="footer-3 text-center-xs pt-3 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <h3>{{ __('home.we_are_here') }}</h3>
                <div class="row">
                    <div class="col-md-12 d-flex align-items-start">
                        <div class="d-flex align-items-center">
                            <img src="{{ getLogo() }}" class="w-30" alt="map">
                            <address class="ml-3">
                                {{ setting(session('lang') . '_address') }}<br>
                                <i class="fas fa-mobile-alt"></i> <a href="tel:{{ setting('phone') }}">{{ setting('phone') }}</a><br>
                                <i class="fas fa-envelope-open"></i> <a href="mailto:"{{ setting('email') }}>{{ setting('email') }}</a>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="row border-right border-r-0">
                    <div class="col-md-6">
                        <ul>
                            <li><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                            <li><a href="{{ url('about') }}">{{ __('home.about') }}</a></li>
                            <li><a href="{{ url('services') }}">{{ __('home.our_services') }}</a></li>

                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>

                            <li><a href="{{ url('contact-us') }}">{{ __('admin.contact_us') }}</a></li>
                            <li><a href="{{ url('projects') }}">{{ __('home.our_projects') }}</a></li>
                            <li><a href="{{ url('blogs') }}">{{ __('home.blogs') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 offset-lg-1 follow-us">
                <h3>{{ __('home.follow_us') }}</h3>
                <ul class="social-nav">
                    @php
                        $socialSites = ['facebook', 'twitter', 'instagram'];
                    @endphp
                    @for($i = 0; $i < count($socialSites); $i++)
                        @if(setting($socialSites[$i]) != '')
                            <li>
                                <a href="{{ setting($socialSites[$i]) }}">
                                    <i class="fab fa-{{ $socialSites[$i] }}"></i>
                                </a>
                            </li>
                        @endif
                    @endfor

                </ul>
                <p class="mb-0">{{ __('home.copy_right') }} <strong>{{ setting('website_title') }}</strong>.</p>
            </div>
        </div>
    </div>
</footer>
<!-- end footer section -->
