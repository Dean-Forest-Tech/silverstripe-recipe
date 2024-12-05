<div class="h-100 card">
	<% if $Image.exists %>
		<div class="card-img-top">
			$Image.Square
		</div>
	<% end_if %>

	<div class="card-body">
		<blockquote>
			{$Content}
		</blockquote>
		<p class="cite">
			<em>
				- {$Name}
				<% if $Name && $Business %>, <% end_if %>
				{$Business}
			</em>
		</p>
	</div>
</div>

