<h2 class="text-center"><span>$MenuTitle</span></h2>
<div class="row">
    <% if $FeaturedImage %>
        <div class="col-sm" role="main">
            <p class="banner-image"><img class="img-fluid" src="$FeaturedImage.FocusFill(1200,500).URL" alt="$FeaturedImage.Title"></p>
        </div>
    <% end_if %>
	<div class="col-sm content" role="main">
		<p>$Content.Summary <a href="$Link"><strong>Read more $MenuTitle</strong></a></p>
	</div>
</div>