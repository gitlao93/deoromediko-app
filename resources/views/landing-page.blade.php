<x-layout>
<main class="main-container">
    <section class="hero-banner-container">
        <div class="hero-banner-dummy-container"></div>
        <div class="search-box-container">
            <h1>De Oro Mediko Drug<br>Distribution services</h1>
            <p>Welcome to <b>De Oro Mediko Drug Distribution Services</b>, your trusted partner in
                providing
                medical drugs to government agencies. We are dedicated to delivering high-quality and affordable
                drugs
                to
                those in need.</p>
            <a id="view-all" href="/products">View all products</a>
            <form action="/products">
                <div class="input-box">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" placeholder="search medicine..." name="search" />
                    <button class="button">Search</button>
                </div>
            </form>
    </section>

    </div>

    <section class="about-container">

        <div class="about-desc-container">

            <h2>About De Oro Mediko</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore obcaecati, 
                suscipit itaque voluptatibus corrupti iusto perspiciatis adipisci inventore 
                mollitia hic nostrum accusantium commodi quas eius similique voluptatum magnam 
                aut sapiente!<br>orem, ipsum dolor sit amet consectetur adipisicing elit. Labore obcaecati, 
                suscipit itaque voluptatibus corrupti iusto perspiciatis adipisci inventore 
                mollitia hic nostrum accusantium
            </p>

        </div>
        <div class="about-image-container">
            <img src="{{asset('/images/OroMedikoFrontDesk.jpg')}}" alt="Oro_mediko_front_desk">
        </div>

    </section>
</main>

</x-layout>
