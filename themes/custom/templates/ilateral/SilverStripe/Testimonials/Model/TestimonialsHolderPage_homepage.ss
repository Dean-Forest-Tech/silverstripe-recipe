<div class="container-fluid">
    <h2 class="text-center"><span>$MenuTitle</span></h2>
    <% if $Testimonials.exists %>
        <div class="row mb-4">
            <% loop $RandomTestimonials.Limit(4) %>
                <div class="col">
                    <% include DFT\SilverStripe\Testimonials\Includes\Testimonial %>
                </div>
            <% end_loop %>
        </div>
    <% end_if %>
    <p class="text-center">
        <a class="btn btn-danger px-5 py-3" href="$Link">
            <strong>See all $MenuTitle</strong>
        </a>
    </p>
</div>
