<?php @include('partials/head.php'); ?>
	<div class="search-container active-search">
    	<div class="container">
	        
	        <form action="#" method="post" class="centerform">
	            <input type="text" name="search" id="searchfield" placeholder="Keywords...">
	            <input type="submit" id="postsearch" value="Zoeken">
	        </form>

	    </div>
	</div>
<?php @include('partials/nav.php'); ?>
	<!-- search -->
    <section id="search">
	    <div class="container">
	        <article>
	        	<div class="col-50">
	        		<h2>Zoekresultaten</h2>
	        		<div class="search-keyword">voor "Kunst en Cultuur"</div>
	        		<div class="search-result">
	        			<a href="#">
		        			<h3>Kunst</h3>
		        			<p>De identiteit van Edam-Volendam ligt enerzijds in het zichtbare erfgoed en anderzijds in de sterk gevoelde eigen identiteit binnen zowel de Volendamse als de Edamse bevolking. </p>
	        			</a>
	        		</div>
	        		<div class="search-result">
	        			<a href="#">
		        			<h3>Cultuur</h3>
		        			<p>De identiteit van Edam-Volendam ligt enerzijds in het zichtbare erfgoed en anderzijds in de sterk gevoelde eigen identiteit binnen zowel de Volendamse als de Edamse bevolking. </p>
	        			</a>
	        		</div>
	        	</div>
	        </article>
	    </div>
    </section>

        <!-- End search -->

<?php @include('partials/footer.php'); ?>

