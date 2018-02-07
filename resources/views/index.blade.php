@include("partials/head")

<body>
<div class="container-fluid">
    @include("partials.header")
    @include("partials.navigation")
    @include("partials.about")
    @include("admin.navigation")

    <div class="w3-container" style="margin: 0 auto; text-align: justify;">
        @if(count($posts) > 0):
        @foreach($posts as $post)
            @include("post-details")
        @endforeach

        <div class="w3-cell-row">
            <div class="w3-container w3-cell">
                <p class="prev">
                    <a href="<?php echo config('app.locale') ?>?page=<?php echo $page - 1?>">&#10094; {{ trans('lang.noti_oldPost') }}</a>
                </p>
            </div>

            <div class="w3-container w3-cell">
                <p class="next">
                    <a href="<?php echo config('app.locale') ?>?page=<?php echo $page + 1 ?>">{{ trans('lang.noti_nextPost') }} &#10095;</a>
                </p>
            </div>
        </div>
        @else
            <div class="text-center" style="padding: 100px 0;">{{ trans('lang.noti_noData') }}</div>
        @endif
        @include("post-lists")
    </div>
</div>

<div style="margin-top: 30px">
    @include("partials.footer")
</div>

@include("partials.endpage")
</body>
</html>
