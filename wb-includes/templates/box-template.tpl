{foreach from = $posts item = post}
<div class="box">
	<div class="votecell">
		<a class="vote_up_off" title="up vote">up vote</a>
		<span class="vote_count_post">{$post.post_vote_count}</span>
		<a class="vote_down_off" title="down vote">down vote</a>
		<div class="user"><a href=""><img src="{$headimg_path}u{$post.post_author}.jpg"/></a></div>
	</div>
	<div class="box_content">
	{$post.post_content}
	<div class="splink">
	<a href="{$post.post_slink}" class="outlink" target="_blank">微博原文</a><a href="">评论( {$post.post_comment_count} )</a><a href="">转发到微博</a>
	</div>
	</div>
</div>
{/foreach}