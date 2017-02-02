<!-- Header -->
<header>
    <div class="container">
        <div class="image">
            <div class="overlay">
                <h1>{$headerInfo.0.header_title}</h1>
                <p>{$headerInfo.0.header_text}</p>
                <a href="#" class="btn">Meer informatie</a>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->


<!-- Plaatsen -->
<section id="places">
    <div class="container">
        {foreach from=$bodyInfo item=location}
            <div class="col-33 {$location.name|lower}" style="background: url('assets/images/media/plaatsen/{$location.img}'); background-size: cover">
                <a href="#">
                    <div class="overlay">
                        <h3>{$location.name}</h3>
                        <p>{$location.info}</p>
                    </div>
                </a>
            </div>
        {/foreach}
    </div>
</section>
<!-- End Plaatsen -->


<!-- Info -->
<section id="info">
    <article>
        <div class="container">

            <div class="col-50">
                <h2>Kunst</h2>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque urna vel orci interdum
                    rhoncus. Curabitur id lorem risus. Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum
                    lobortis.
                </p>

                <p>
                    Pellentesque imperdiet maximus risus, id ultricies tortor blandit in. Suspendisse vel molestie
                    purus, at lobortis nisi. Nulla quis facilisis sapien. Ut ut ipsum nisi. Curabitur id lorem risus.
                    Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis.
                </p>
            </div>

            <div class="col-50">
                <h2>Cultuur</h2>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque urna vel orci interdum
                    rhoncus. Curabitur id lorem risus. Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum
                    lobortis.
                </p>

                <p>
                    Pellentesque imperdiet maximus risus, id ultricies tortor blandit in. Suspendisse vel molestie
                    purus, at lobortis nisi. Nulla quis facilisis sapien. Ut ut ipsum nisi. Curabitur id lorem risus.
                    Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis.
                </p>
            </div>

        </div>
    </article>

    <aside></aside>

</section>
<!-- End Info -->

<!-- Inschrijven -->
<section id="inschrijven">
    <article>
        <div class="container">
            <div class="col-50">
                <h2>Uw organisatie op de website?</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque urna vel orci interdum
                    rhoncus. Curabitur id lorem risus. Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum
                    lobortis.
                </p>
                <p>
                    Pellentesque imperdiet maximus risus, id ultricies tortor blandit in. Suspendisse vel molestie
                    purus, at lobortis nisi. Nulla quis facilisis sapien. Ut ut ipsum nisi. Curabitur id lorem risus.
                    Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis.
                </p>
            </div>
            <div class="col-50">
                <h2>Schrijf uw organisatie in!</h2>
                <form action="?action=register" method="post">
                    <input class="first" type="text" placeholder="Voornaam" name="voornaam" required>
                    <input type="text" placeholder="Achternaam" name="achternaam" required>
                    <input class="first" type="tel" placeholder="Telefoon" name="telefoon" required>
                    <input type="email" placeholder="E-mail" name="e-mail" required>
                    <input class="first" type="text" placeholder="Naam organisatie" name="naam-organisatie" required>
                    <input type="url" placeholder="Website" name="website" required>
                    <select class="first" name="type" required>
                        <option value="cultuur">Cultuur</option>
                        <option value="kunst">Kunst</option>
                    </select>
                    <select name="plaats" required>
                        <option value="edam">Edam</option>
                        <option value="volendam">Volendam</option>
                        <option value="warder">Warder</option>
                        <option value="kwadijk">Kwadijk</option>
                        <option value="oosthuizen">Oosthuizen</option>
                        <option value="schardam">Schardam</option>
                        <option value="beets">Beets</option>
                        <option value="middelie">Middelie</option>
                        <option value="hobrede">Hobrede</option>
                    </select>
                    <input type="submit" value="Verstuur" name="subscribe" class="btn">
                </form>
            </div>
        </div>
    </article>
</section>
<!-- End Inschrijven -->

