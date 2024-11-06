<div class="container" role="main">
	<div class="row">
		<div class="col">
            <article class="gallery-page">
                <div class="content">
                    $Content
                </div>

                <% if $PaginatedTestimonials.exists %>
                    <div id="Testimonials">
                        <div class="row">
                            <% loop $PaginatedTestimonials %>
                                <div id="Testimonial$ID" class="testimonial col-12 col-md-6 col-lg-4">
                                    <% include DFT\SilverStripe\Testimonials\Includes\Testimonial %>
                                </div>
                            <% end_loop %>
                        </div>
                        
                        <% with $PaginatedTestimonials %>
                            <% include Pagination %>
                        <% end_with %>
                    </div>
                <% end_if %>
            </article>

            $Form
            $PageComments
        </div>

		<% if $Menu(2) || $SideBarView.Widgets %>
			<% include SideBar %>
		<% end_if %>
    </div>
</div>

