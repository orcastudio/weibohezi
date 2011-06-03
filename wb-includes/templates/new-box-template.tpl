{foreach from = $newposts item = newpost}
<div class="box">
	<div class="votecell">
		<a class="vote_up_off" title="up vote">up vote</a>
		<span class="vote_count_post">{$newpost.post_vote_count}</span>
		<a class="vote_down_off" title="down vote">down vote</a>
		<div class="user"><a href=""><img src="{$headimg_path}u{$newpost.post_author}.jpg"/></a></div>
	</div>
	<div class="box_content">
	{$newpost.post_content}
	<div class="splink">
	<a href="{$newpost.post_slink}" class="outlink" target="_blank">微博原文</a><a href="">评论( {$newpost.post_comment_count} )</a><a href="">转发到微博</a>
	</div>
	</div>
</div>
{/foreach}