<x-layout>
    {{-- hero banner --}}
    <section class="hero-banner-home">
        <div class="vh-100 main-content flex-row">
            <div class="wd-50 flex-row fl-justify-content-end">
                <img src="{{asset('/images/home-image.png')}}" alt="Home_image">
            </div>
            <div class="flex-col fl-align-start fl-justify-content-center h-100 wd-50">
                <h1>De Oro Mediko Drug<br>Distribution services</h1>
                <p class="wd-80">Welcome to <b>De Oro Mediko Drug Distribution Services</b>, your trusted partner in providing medical drugs to government agencies. We are dedicated to delivering high-quality and affordable drugs to those in need.</p>
                <a id="view-all" href="/products">view all products</a>
                <form class="search-box wd-80">
                    <div class="input-box">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input type="text" placeholder="search medicine..." />
                        <button class="button">Search</button>
                        
                    </div>
                    
                </form>
                
            </div>
            
        </div>
    </section>

    <section class="about-section-home">

        <div class="vh-90 main-content flex-row">
            
            <div class="flex-col fl-align-end fl-justify-content-center h-100 wd-50 pd-l-5">
                <h2>De Oro Mediko Drug Distribution services</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua. Ut faucibus pulvinar elementum integer enim neque volutpat. Amet aliquam id diam maecenas ultricies
                    mi. Sapien eget mi proin sed libero enim sed. Pellentesque habitant morbi tristique senectus et netus et. Elit 
                    ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at augue. Cursus vitae congue mauris rhoncus aenean
                    vel elit scelerisque mauris.
                </p>
                <p>
                    Pretium viverra suspendisse potenti nullam ac. Neque egestas congue quisque egestas. 
                    Odio morbi quis commodo odio aenean sed adipiscing diam. Eget velit aliquet sagittis id. 
                    Enim nunc faucibus a pellentesque sit amet. Dictum sit amet justo donec enim diam vulputate ut. 
                    Egestas pretium aenean pharetra magna ac. Molestie ac feugiat sed lectus. Tellus elementum sagittis 
                    vitae et leo duis ut diam quam. Sed blandit libero volutpat sed cras ornare arcu. Enim lobortis scelerisque 
                    fermentum dui. 
                </p>
                
            </div>

            <div class="wd-50 flex-row fl-justify-content-start fl-align-center">
                <div class="image-container pd-l-5">
                    <img src="{{asset('/images/OroMedikoFrontDesk.jpg')}}" alt="Home_image">
                </div>
            </div>
            
        </div>

    </section>

</x-layout>