<div class="articles">
	<? foreach($articles as $article) : ?>
		<div class="article">
			<?= @template('com://site/news.view.article.default_article', array('article' => $article)) ?>
			<div class="article-toolbar">
				<a class="btn btn-small" href="<?= @route('view=article&id='.$article->id.'&slug='.$article->slug) ?>"><?= @text('Read more') ?> <i class="icon-arrow-right"></i></a>
			</div>
		</div>
	<? endforeach ?>
	
	<?= @helper('paginator.pagination', array('total' => $total, 'show_count' => false, 'show_limit' => false)) ?>
</div>

<module title="" position="scopebar">
	<?= @template('default_scopebar') ?>
</module>

<module title="" position="header">
	<?= @template('com://site/news.view.grid.search', array('state' => $state)) ?>
</module>

<? if($agent) : ?>
<module title="<?= @text('') ?>" position="sidebar">
<div class="articles-toolbar">
    <? if($state->category) : ?>
    <a style="width: 90%;" class="btn btn-primary btn-small" href="<?= @route('view=article&layout=form&category='.$state->category) ?>">
    <? else : ?>
    <a style="width: 90%;" class="btn btn-primary btn-small disabled" href="#">
    <? endif ?>
        <i class="icon-plus icon-white"></i> <?= @text('New') ?>
    </a>
</div>
</module>
<? endif ?>

<module title="<?= @text('Calendar') ?>" position="sidebar">	
	<?= @service('mod://site/calendar.html')->display(); ?>
</module>

<module title="" position="syndicate">	
	<a target="_blank" href="<?= KRequest::url() ?>?format=rss" class="rss-icon">RSS</a>
</module>