@php
    //thtis session get from admin sidebar 
    $value =  Session::get('profileImgByUserId');
    //dd($value);
    //$profileUserId =DB::table('profiles')
                //->join('users','profiles.user_id', '=', 'users.id')
                //->select('users.name','users.id','profiles.user_id','profiles.image','profiles.designation')
                //->orderBy('id','DESC')
                //->first();
                //   dd($profileUserId);
@endphp 

<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
    <div class="text-center">
        <div class="author-img" style="background-image: url('{{asset($value->image)}}');"></div>
        <h1 id="colorlib-logo"><a href="index.html">{{$value->name}}</a></h1>
        <span class="position">
            <a href="#">{{$value->designation}}</a> in {{$value->district}}
        </span>
    </div>
    <nav id="colorlib-main-menu" role="navigation" class="navbar">
        <div id="navbar" class="collapse">
            <ul>
                <li class="active"><a href="#" data-nav-section="home">Home</a></li>
                <li><a href="#" data-nav-section="about">About</a></li>
                <li><a href="#" data-nav-section="services">Services</a></li>
                <li><a href="#" data-nav-section="skills">Skills</a></li>
                <li><a href="#" data-nav-section="education">Education</a></li>
                <li><a href="#" data-nav-section="experience">Experience</a></li>
                <li><a href="#" data-nav-section="work">Work</a></li>
                <li><a href="#" data-nav-section="blog">Blog</a></li>
                <li><a href="#" data-nav-section="contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="colorlib-footer">
        <p><small>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright <script>document.write(new Date().getFullYear());</script> All rights reserved. Made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> </span> <span>Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a></span> <span>Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash.com</a></span></small></p>
        <ul>
            <li><a href="#"><i class="icon-facebook2"></i></a></li>
            <li><a href="#"><i class="icon-twitter2"></i></a></li>
            <li><a href="#"><i class="icon-instagram"></i></a></li>
            <li><a href="#"><i class="icon-linkedin2"></i></a></li>
        </ul>
    </div>
</aside>