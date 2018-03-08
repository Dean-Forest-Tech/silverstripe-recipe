<h2 class="text-center"><span>$MenuTitle</span></h2>
<% if $BlogPosts.Exists %>
    <div class="row">
        <% loop $BlogPosts.Limit(4) %>
            <div class="col-sm text-center">
                <% include SilverStripe\\Blog\\PostSummary %>
            </div>
        <% end_loop %>
    </div>
<% else %>
    <p><%t SilverStripe\\Blog\\Model\\Blog.NoPosts 'There are no posts' %></p>
<% end_if %>
