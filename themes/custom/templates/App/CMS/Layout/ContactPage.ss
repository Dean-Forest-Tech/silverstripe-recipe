<% include Banner %>

<div class="col-sm content" role="main">
	<div class="row">
		<div class="col-sm">
			$Content
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3">
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
							$PhoneNumber
						<% end_if %>
						<% if $Email %>
							<% if $PhoneNumber %><br /><% end_if %>
							<a href="mailto:{$Email}">$Email</a>
						<% end_if %>
					</p>
				<% end_if %>
			<% end_if %>
		</div>
	</div>
	$Form
	$PageComments
</div>
<% if $Menu(2) || $SideBarView.Widgets %>
	<% include SideBar %>
<% end_if %>
