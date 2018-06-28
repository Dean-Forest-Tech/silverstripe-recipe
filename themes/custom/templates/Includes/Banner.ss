<% if $MapEmbed %>
    <div class="map-row row">
        <div class="mb-4 embed-responsive embed-responsive-map">
            $MapEmbed
        </div>
    </div>
<% else_if $FeaturedImage %>
    <p class="banner-image row mb-4 d-block">
        <span class="d-sm-none">$FeaturedImage.FocusFill(400,300)</span>
        <span class="d-none d-sm-block d-lg-none">$FeaturedImage.FocusFill(800,400)</span>
        <span class="w-100 d-none d-lg-block">$FeaturedImage.FocusFill(1200,500)</span>
    </p>
<% else_if $Parent.FeaturedImage %>
    <p class="banner-image row mb-4 d-block">
        <span class="d-sm-none">$Parent.FeaturedImage.FocusFill(400,300)</span>
        <span class="d-none d-sm-block d-lg-none">$Parent.FeaturedImage.FocusFill(800,400)</span>
        <span class="d-none d-lg-block">$Parent.FeaturedImage.FocusFill(1200,500)</span>
    </p>
<% end_if %>

<div class="col-sm-12">
    <div class="row">
        <div class="col">
            <h1<% if not $Level(2) %> class="text-center"<% end_if %>>
                $Title
            </h1>
        </div>
        <% include BreadCrumbs %>
    </div>
</div>