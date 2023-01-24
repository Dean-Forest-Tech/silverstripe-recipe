<% if $MapEmbedCode %>
    <div class="map-row row">
        <div class="mb-4 embed-responsive embed-responsive-map">
            $MapEmbedCode
        </div>
    </div>
<% else_if $FeaturedImage %>
    <div class="banner-image mb-4 d-block">
        $FeaturedImage.ContentBanner
    </div>
<% else_if $Parent.FeaturedImage %>
    <div class="banner-image mb-4 d-block">
        $Parent.FeaturedImage.ContentBanner
    </div>
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