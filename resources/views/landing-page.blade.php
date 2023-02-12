<x-layout>
    <main class="main-container">
        <section class="hero-banner-container">
            <div class="hero-banner-dummy-container"></div>
            <div class="search-box-container product-search-wrapper">
                <h1>De Oro Mediko Drug<br>Distribution services</h1>
                <p>Welcome to <b>De Oro Mediko Drug Distribution Services</b>, your trusted partner in
                    providing
                    medical drugs to government agencies. We are dedicated to delivering high-quality and affordable
                    drugs
                    to
                    those in need.</p>
                <a id="view-all" href="/products">View all products</a>
                <form class="search-box" action="/products/">
                    <div class="input-box">
                        <i class="fa fa-search search-icon" aria-hidden="true"></i>
                        <input type="text" placeholder="Mag search ng gamot..." name="search" />
                        <button class="button"><i class="fa fa-search icon-btn" aria-hidden="true"></i><span>Search</span></button>
                    </div>
                </form>
        </section>

        </div>

        <section class="about-container">

            <div class="about-desc-container">

                <h2>About De Oro Mediko</h2>
                <p>Distributor for high quality and affordable price for<br>Hormones Replacement Therapy (HRT) ,<br>
                     Cancer and Dialysis medicines.
                </p>

            </div>
            <div class="about-image-container">
                <img src="{{ asset('/images/OroMedikoFrontDesk.jpg') }}" alt="Oro_mediko_front_desk">
            </div>

        </section>
    </main>

</x-layout>
