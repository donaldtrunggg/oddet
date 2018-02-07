<div id="container">
    <div id="content">
        <div id="main">
            <div class="post">
                <h2><a href="<?php echo config('app.locale') ?>/<?php echo $post->slug ?> ">{{ $post->title }}</a></h2>
                <p class="date">18 <span>Jul</span></p>
            </div>

            <ul class="meta">
                <li>{{ trans('lang.post_cate') }}<a target="_blank" href="/<?php echo config('app.locale') ?>/category/{{ $post->cat_slug }}">{{ $post->cat_slug }}</a></li>
                <li>{{ $post->create_date }}</li>
            </ul>

            <div class="post-content">
                <?php $post->des = substr($post->description,0,500) . "..."; ?>
                <?php echo html_entity_decode($post->des) ?>
                    <a href="<?php echo config('app.locale') ?>/<?php echo $post->slug ?>">See more</a>
            </div>

            <hr style="display: block;margin-top: 0;margin-bottom: 0.1em;margin-left: auto;margin-right: auto;border-style: inset;border: 1px solid #000;">
        </div>
    </div>
</div>