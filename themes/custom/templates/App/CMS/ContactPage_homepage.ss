<h2 class="text-center"><span>$MenuTitle</span></h2>
<div class="row">
	<div class="col-sm content" role="main">
        <p>$Content.Summary</p>
        <% if $Address || $PhoneNumber || $Email %>
            <p>
                <strong>Contact Info:</strong>
            </p>
                <% if $Address %>
                    <address>
                        $Address
                    </address>
                <% end_if %>
            <% if $PhoneNumber || $Email %>
                <p>
                    <% if $PhoneNumber %>
                        <a href="{$PhoneLink}">
                            <i class="fas fa-phone"></i>
                            {$PhoneNumber}
                        </a><br/>
                    <% end_if %>
                    <% if $MobileNumber %>
                        <a href="{$MobileLink}">
                            <i class="fas fa-mobile"></i>
                            {$MobileNumber}
                        </a><br/>
                    <% end_if %>
                    <% if $Email %>
                        <a href="mailto:{$Email}">
                            <i class="fas fa-at"></i>
                            {$Email}
                        </a>
                    <% end_if %>
                </p>
            <% end_if %>
        <% end_if %>
        <p><a href="$Link"><strong>$MenuTitle</strong></a></p>
    </div>
	<div class="col-sm" role="main">
        <% if $MapEmbed %>
            <div class="embed-responsive embed-responsive-map">
                $MapEmbed.RAW
            </div>
        <% else_if $FeaturedImage %>
            <p class="banner-image">$FeaturedImage.ContentBanner</p>
        <% end_if %>
    </div>
</div>